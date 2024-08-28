const ThaiElementAssessment = require('../ThaiElementAssessment');

module.exports = (req, res) => {
    const assessment = new ThaiElementAssessment();
    
    const answers = req.body.answers || {};
    assessment.processAnswers(Object.values(answers));
    
    const symptoms = req.body.symptoms || [];
    assessment.processSymptoms(symptoms);
    
    const results = assessment.getResults();
    
    res.json(results);
};