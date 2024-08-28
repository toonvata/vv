<?php
class ThaiElementAssessment {
    private $questions;
    private $clinical_symptoms;
    private $scores;
    private $user_symptoms;

    public function __construct() {
        $this->questions = [
                "รสชาติอาหารที่ชอบ" => [
                    "ปิตตะ" => "ชอบกินของร้อนๆ เผ็ด เปรี้ยว รสจัด อาหารเผ็ด(เครื่องเทศ เครื่องแกง)",
                    "วาตะ" => "ร้อน ฝาด ขม รสเค็ม",
                    "เสมหะ" => "เปรี้ยวหวาน"
                ],
                "อาหาร" => [
                    "ปิตตะ" => "ของดิบ อาหารบูดเน่า แอลกอฮอล์",
                    "วาตะ" => "กินเนื้อแห้ง ปลาแห้ง น้ำอัดลม", 
                    "เสมหะ" => "กินหวานมัน กินย้ำ กินหลากหลาย น้ำหวาน ขนมหวาน"
                ],
                "การกิน" => [
                    "ปิตตะ" => "กินทีละมากๆ กินเป็นมื้อๆ กินกลางคืน",
                    "วาตะ" => "กินบ่อย กินเก่ง หิวบ่อย",
                    "เสมหะ" => "กินน้อย กินเหลือ กินช้า"
                ],
                "น้ำ" => [
                    "ปิตตะ" => "ดื่มน้ำน้อย กระหายน้ำเย็น",
                    "วาตะ" => "ไม่ค่อยดื่มน้ำ ดื่มน้ำมาก",
                    "เสมหะ" => "ชอบน้ำอุ่น"
                ],
                "อุจจาระ" => [
                    "ปิตตะ" => "แข็งแห้ง ถ่ายลำบาก",
                    "วาตะ" => "ท้องผูก ถ่ายบ่อย ถ่ายไม่สุด",
                    "เสมหะ" => "อุจจาระปกติ ถ่ายวันละครั้ง"
                ],
                "ปัสสาวะ" => [
                    "ปิตตะ" => "ปัสสาวะร้อน สีเข้ม ฉี่น้อย",
                    "วาตะ" => "ปัสสาวะบ่อย ปริมาณน้อย กระปริบกระปรอย",
                    "เสมหะ" => "ปัสสาวะสีซีด ปัสสาวะกลางคืน ครั้งละมากๆ"
                ],
                "ลักษณะการทำงาน" => [
                    "ปิตตะ" => "ทำงานหนัก ใช้แรงงาน ทำงานกลางแจ้ง นักกีฬา คนออกกำลังกาย",
                    "วาตะ" => "ทำงานนิ่งๆ ทำงานนั่งโต๊ะ ไม่ค่อยได้ขยับ",
                    "เสมหะ" => "ทำงานเบาๆ พอดีๆ สบายๆ นั่งๆนอนๆ ทำงานห้องแอร์"
                ],
                "อารมณ์" => [
                    "ปิตตะ" => "อารมณ์เสีย โกรธง่าย โมโหง่าย มักโกรธเมื่อตะวันเที่ยง อากาศร้อน หงุดหงิดง่าย",
                    "วาตะ" => "คิดมาก คิดเยอะ ชอบดูแสงสีเสียง มักกล่าวเรื่องเศร้าโศก อารมณ์แปรปรวน",
                    "เสมหะ" => "อารมณ์ดี ยิ้มง่าย ชอบอารมณ์นิยมกลืน ใจเย็น คุยเก่ง อัธยาศัยดี"
                ],
                "การพูดการคุย" => [
                    "ปิตตะ" => "คุยใช้เหตุผล พูดจาหนักแน่น",
                    "วาตะ" => "คุยไร้สาระ เนื้อหาไม่เรียบเรียง พูดเร็ว",
                    "เสมหะ" => "พูดช้า"
                ],
                "สมาธิ" => [
                    "ปิตตะ" => "สมาธิจดจ่อ ทำงานละเอียด",
                    "วาตะ" => "สมาธิสั้น ทำอะไรไม่ได้นาน ย้ำคิดย้ำทำ ทำอะไรหลายอย่างในเวลาเดียวกัน",
                    "เสมหะ" => "สมาธิดี ทำงานได้นาน"
                ],
                "อากาศ" => [
                    "ปิตตะ" => "ชอบอยู่ที่ร้อนๆ",
                    "วาตะ" => "ชอบอยู่ที่ที่ลมพัด อากาศถ่ายเท",
                    "เสมหะ" => "ชอบอยู่ที่เย็นๆ ชื้นๆ"
                ],
                "อาบน้ำ" => [
                    "ปิตตะ" => "ชอบอาบน้ำร้อน อาบน้ำตอนกลางวันร้อนๆ ตอนกลางคืนดึกๆ",
                    "วาตะ" => "อาบน้ำเร็ว ไม่ค่อยอาบน้ำ",
                    "เสมหะ" => "ชอบแช่น้ำ เล่นน้ำ อาบน้ำนาน"
                ],
                "การนอน" => [
                    "ปิตตะ" => "นอนกลางวันมาก กลางคืนนอนไม่หลับ",
                    "วาตะ" => "กลางคืนไม่นอน ชอบคิดฟุ้งซ่าน หลับไม่สนิท",
                    "เสมหะ" => "ง่วงหงาวหาวนอนนัก นอนเยอะ หลับสนิท"
                ],
                "ความฝัน" => [
                    "ปิตตะ" => "ฝันน่ากลัว ผี ปีศาจ ไฟ ความร้อน",
                    "วาตะ" => "ฝันตื่นเต้น ฝันเยอะ ฝันว่าตกจากที่สูง",
                    "เสมหะ" => "ฝันดี ฝันว่าได้ว่ายน้ำนอนสระน้ำ เห็นของสวยๆงามๆ"
                ],
                "ลักษณะร่างกาย" => [
                    "ปิตตะ" => "ผิวแห้ง ร้อนหน้าร้อนปาก เหงื่อยออกน้อย ผิวไม่ผ่องใส",
                    "วาตะ" => "ผื่นลมพิษทั่วตัว แสบคัน ผิวดำไม่ผ่องใส",
                    "เสมหะ" => "มักเป็นตุ่ม ฝีกบวม เหงื่อออกมาก"
                ]
            ];

        $this->clinical_symptoms = [
            "ปิตตะ" => ["ร้อนใน", "ปากขม", "กระหายน้ำ", "โรคกระเพาะ", "กรดไหลย้อน", "ตับ", "ถุงน้ำดี", "ความดันโลหิตสูง", "ตาแห้ง", "เยื่อบุตาอักเสบ", "ไมเกรน"],
            "วาตะ" => ["ปวดเมื่อยตามร่างกาย", "โรคทางเดินหายใจ", "หอบหืด", "ภูมิแพ้", "ท้องผูกท้องอืด", "แน่นท้อง", "ลำไส้แปรปรวน", "นอนไม่หลับ", "หลับไม่สนิท", "วิตกกังวล", "อารมณ์แปรปรวน", "โรคทางเดินอาหาร", "ข้อต่อกระดูก", "ปลายประสาทอักเสบ"],
            "เสมหะ" => ["น้ำหนักเกิน", "อ้วน", "เบาหวาน", "ไขมัน", "อ่อนเพลีย ล้า เหนื่อยง่าย"]
        ];

        $this->scores = ["ปิตตะ" => 0, "วาตะ" => 0, "เสมหะ" => 0];
        $this->user_symptoms = [];
    }

    public function getQuestions() {
        return $this->questions;
    }

    public function getClinicalSymptoms() {
        return $this->clinical_symptoms;
    }

    public function processAnswers($answers) {
        foreach ($answers as $element) {
            $this->scores[$element]++;
        }
    }

    public function determineDominantElement() {
        return array_keys($this->scores, max($this->scores))[0];
    }

    public function processSymptoms($symptoms) {
        $this->user_symptoms = $symptoms;
    }

    public function analyzeCorrelation($dominant_element) {
        $total_score = array_sum($this->scores);
        $dominant_ratio = $this->scores[$dominant_element] / $total_score;
        
        $total_symptoms = count($this->clinical_symptoms[$dominant_element]);
        $user_symptoms_count = count($this->user_symptoms);
        
        $symptom_ratio = $total_symptoms > 0 ? $user_symptoms_count / $total_symptoms : 0;
        
        return ($dominant_ratio + $symptom_ratio) / 2;
    }

    public function getResults() {
        $dominant_element = $this->determineDominantElement();
        $correlation = $this->analyzeCorrelation($dominant_element);

        $results = [
            'scores' => $this->scores,
            'dominant_element' => $dominant_element,
            'user_symptoms' => $this->user_symptoms,
            'correlation' => $correlation,
            'risk_level' => $this->getRiskLevel($correlation),
            'explanation' => $this->getExplanation($correlation)
        ];

        return $results;
    }

    private function getRiskLevel($correlation) {
        if ($correlation <= 0.5) {
            return "ไม่มีความเสี่ยงที่ควรเฝ้าระวัง";
        } elseif ($correlation <= 0.8) {
            return "มีความเสี่ยงในระดับเฝ้าระวัง";
        } else {
            return "มีความเสี่ยงมาก โปรดพบแพทย์เพื่อประเมินเพิ่มเติม";
        }
    }

    private function getExplanation($correlation) {
        if ($correlation <= 0.5) {
            return "ธาตุเด่นของคุณไม่มีความสัมพันธ์มากนักกับอาการทางคลินิกที่พบ คุณควรดูแลสุขภาพตามปกติและสังเกตอาการเปลี่ยนแปลงต่างๆ";
        } elseif ($correlation <= 0.8) {
            return "ธาตุเด่นของคุณมีความสัมพันธ์ในระดับปานกลางกับอาการทางคลินิกที่พบ คุณควรเฝ้าระวังและดูแลสุขภาพอย่างใกล้ชิด หากมีอาการรุนแรงขึ้น ควรปรึกษาแพทย์";
        } else {
            return "ธาตุเด่นของคุณมีความสัมพันธ์สูงกับอาการทางคลินิกที่พบ คุณควรพบแพทย์เพื่อรับการตรวจประเมินอย่างละเอียด อาจจำเป็นต้องได้รับการรักษาหรือการดูแลเฉพาะทาง";
        }
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assessment = new ThaiElementAssessment();
    
    // Process answers
    $answers = $_POST['answers'] ?? [];
    $assessment->processAnswers($answers);
    
    // Process symptoms
    $symptoms = $_POST['symptoms'] ?? [];
    $assessment->processSymptoms($symptoms);
    
    // Get results
    $results = $assessment->getResults();
    
    // Convert results to JSON for AJAX response
    echo json_encode($results);
    exit;
}

// If not a POST request, display the form
$assessment = new ThaiElementAssessment();
$questions = $assessment->getQuestions();
$clinical_symptoms = $assessment->getClinicalSymptoms();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบประเมินธาตุเด่นตามหลักการแพทย์แผนไทย</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; }
        h1 { color: #333; margin-bottom: 5px; }
        .subtitle { color: blue; font-size: 0.9em; margin-top: 0; }
        form { max-width: 600px; margin: 20px auto; }
        .question { margin-bottom: 20px; }
        label { display: block; margin-bottom: 10px; }
        button { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
        #results { margin-top: 30px; border: 1px solid #ddd; padding: 20px; border-radius: 5px; }
    </style>
</head>
<body>
<h1>แบบประเมินธาตุเด่นตามหลักการแพทย์แผนไทยจากคัมภีร์ธาตุวิวรรณ์</h1>
    <p class="subtitle">โปรดตอบคำถามตามโดยเลือกตัวเลือกที่ตรงกับพฤติกรรมของท่านมากที่สุด</p>
    <form id="assessment-form">
        <?php foreach ($questions as $category => $options): ?>
            <div class="question">
                <h3><?php echo $category; ?></h3>
                <?php foreach ($options as $element => $description): ?>
                    <label>
                        <input type="radio" name="answers[<?php echo $category; ?>]" value="<?php echo $element; ?>" required>
                        <?php echo $description; ?>
                    </label>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <h3>อาการทางคลินิก</h3>
        <?php foreach ($clinical_symptoms as $element => $symptoms): ?>
            <h4><?php echo $element; ?></h4>
            <?php foreach ($symptoms as $symptom): ?>
                <label>
                    <input type="checkbox" name="symptoms[]" value="<?php echo $symptom; ?>">
                    <?php echo $symptom; ?>
                </label>
            <?php endforeach; ?>
        <?php endforeach; ?>

        <button type="submit">ประเมินผล</button>
    </form>

    <div id="results" style="display: none;"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#assessment-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '',
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
    </script>
</body>
</html>