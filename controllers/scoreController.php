<?php

include_once('C:/xampp/htdocs/quizztdd/config/config.php');
include_once(ROOT . 'controllers/controller.php');
include_once(ROOT . 'models/scores.php');
include_once(ROOT . 'models/questions.php');
include_once(ROOT . 'models/reponsesUser.php');

class ScoreController extends Controller {

    /**
     * Stocke la dernière réponse au quizz, calcule le score et supprime les réponses de la base de données
     * @return array Array de type ['score_final' => 3, 'nb_questions_total' => 5]
     */
    public function index()
    {
        // Récupération de la question en cours ainsi que de ses réponses
        $oQuestions = new Questions();
        $aQuestions = $oQuestions->getAll();
        $iIdQuestion = $this->getLastIdQuestion($aQuestions);

        // Si dernière question répondue alors on stocke la réponse en base
        if (isset($_POST['reponse'])) {
            ReponsesUser::addReponseUser($iIdQuestion, $_POST['reponse']);
        }

        // Calcul du score
        $aQuestions = $oQuestions->getAll();
        $iNbQuestionsTotal = sizeof($aQuestions);

        $aScores = ReponsesUser::getAllReponses();
        $iScoreFinal = $this->calculateScore($aScores);
        Scores::addScore($iScoreFinal);

        // Suppression des réponses de l'utilisateur
        ReponsesUser::deleteReponses();

        $aParameters = [
            'iScoreFinal' => $iScoreFinal,
            'iNbQuestionsTotal' => $iNbQuestionsTotal
        ];
        $this->render('views/score.php', $aParameters);
    }

    /**
     * Renvoie l'id de la dernière question
     * @param array $aQuestions Tableau contenant toutes les questions
     * @return int L'id de la dernière question
     */
    public function getLastIdQuestion($aQuestions)
    {
        // MISSING CODE
        return 0;
    }

    /**
     * Calcule le score final du quizz
     * @param array $aScores Array de type [0, 1, 1, 0, 1] correspondant aux réponses correctes/incorrectes
     * @return int Le score du quizz
     */
    public function calculateScore($aScores)
    {
        // MISSING CODE
        return 0;
    }
}

$scoreController = new ScoreController();
$scoreController->index();
