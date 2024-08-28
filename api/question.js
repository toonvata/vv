const ThaiElementAssessment = require('../ThaiElementAssessment');

module.exports = (req, res) => {
    try {
        console.log('API /questions called');
        const assessment = new ThaiElementAssessment();
        const data = {
            questions: assessment.getQuestions(),
            clinical_symptoms: assessment.getClinicalSymptoms()
        };
        console.log('Data prepared:', data);
        res.setHeader('Content-Type', 'application/json');
        res.status(200).json(data);
    } catch (error) {
        console.error('Error in /api/questions:', error);
        res.status(500).json({ error: 'Internal Server Error', message: error.message, stack: error.stack });
    }
};
