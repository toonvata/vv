const ThaiElementAssessment = require('../ThaiElementAssessment');

module.exports = (req, res) => {
    const assessment = new ThaiElementAssessment();
    res.json({
        questions: assessment.getQuestions(),
        clinical_symptoms: assessment.getClinicalSymptoms()
    });
};