$(document).ready(function() {
    $('#assessment-form').html('<p>กำลังโหลดแบบสอบถาม...</p>');
    
    // Fetch questions and populate form
    $.ajax({
        url: '/api/questions',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            let formHtml = '';
            for (let category in data.questions) {
                formHtml += `<div class="question"><h3>${category}</h3>`;
                for (let element in data.questions[category]) {
                    formHtml += `<label>
                        <input type="radio" name="answers[${category}]" value="${element}" required>
                        ${data.questions[category][element]}
                    </label>`;
                }
                formHtml += '</div>';
            }
            
            formHtml += '<h3>อาการทางคลินิก</h3>';
            for (let element in data.clinical_symptoms) {
                formHtml += `<h4>${element}</h4>`;
                data.clinical_symptoms[element].forEach(function(symptom) {
                    formHtml += `<label>
                        <input type="checkbox" name="symptoms[]" value="${symptom}">
                        ${symptom}
                    </label>`;
                });
            }
            
            formHtml += '<button type="submit">ประเมินผล</button>';
            $('#assessment-form').html(formHtml);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $('#assessment-form').html('<p>เกิดข้อผิดพลาดในการโหลดแบบสอบถาม: ' + textStatus + ' - ' + errorThrown + '</p>');
            console.error('Error loading questions:', jqXHR, textStatus, errorThrown);
        }
    });

    // Handle form submission
    $('#assessment-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/api/assess',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                var resultsHtml = '<h2>ผลการประเมิน</h2>';
                resultsHtml += '<p><strong>ธาตุเด่นของคุณคือ:</strong> ' + response.dominant_element + '</p>';
                resultsHtml += '<p><strong>คะแนนของแต่ละธาตุ:</strong></p><ul>';
                for (var element in response.scores) {
                    resultsHtml += '<li>' + element + ': ' + response.scores[element] + '</li>';
                }
                resultsHtml += '</ul>';
                resultsHtml += '<p><strong>อาการทางคลินิกที่พบ:</strong></p><ul>';
                if (response.user_symptoms.length > 0) {
                    response.user_symptoms.forEach(function(symptom) {
                        resultsHtml += '<li>' + symptom + '</li>';
                    });
                } else {
                    resultsHtml += '<li>ไม่พบอาการทางคลินิกที่เลือก</li>';
                }
                resultsHtml += '</ul>';
                resultsHtml += '<p><strong>ค่าความเชื่อมโยงระหว่างธาตุเด่นและอาการทางคลินิก:</strong> ' + response.correlation.toFixed(2) + '</p>';
                resultsHtml += '<p><strong>การประเมินความเสี่ยง:</strong> ' + response.risk_level + '</p>';
                resultsHtml += '<p><strong>คำอธิบายเพิ่มเติม:</strong> ' + response.explanation + '</p>';
                
                $('#results').html(resultsHtml).show();
            },
            error: function() {
                alert('เกิดข้อผิดพลาดในการประมวลผล กรุณาลองใหม่อีกครั้ง');
            }
        });
    });
});
