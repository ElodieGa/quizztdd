<?php

session_start();

include_once('C:/xampp/htdocs/quizztdd/config/config.php');
include_once(ROOT . 'controllers/controller.php');
include_once(ROOT . 'models/questions.php');
include_once(ROOT . 'models/reponses.php');
include_once(ROOT . 'models/reponsesUser.php');

class PlayController extends Controller {

    /**
     * Récupère les informations nécessaires à l'affichage du quizz
     * @return array
     */
    public function index()
    {
        // Récupération du numéro de la question passé dans l'URL
        $iIdQuestion = $_GET['id_question'];

        // Récupération de la question en cours ainsi que de ses réponses
        $oQuestions = new Questions();
        $aQuestions = $oQuestions->getAll();
        $aQuestion = $this->getQuestionById($iIdQuestion, $aQuestions);

        $aAllQuestions = $oQuestions->getAll();
        $iNextIdQuestion = $this->getIdNextQuestion($iIdQuestion, $aQuestions);
        $bIsLastQuestion = empty($iNextIdQuestion) ? 1 : 0;

        $sNextURL = $bIsLastQuestion ? "/quizztdd/score/" : "/quizztdd/play/{$iNextIdQuestion}/";

        $aReponses = Reponses::getReponsesByIdQuestion($iIdQuestion);
        shuffle($aReponses);

        // Si dernière question répondue alors on stocke la réponse en base
        if (isset($_POST['reponse'])) {
            ReponsesUser::addReponseUser($iIdQuestion, $_POST['reponse']);
        }

        $aParameters = [
            'aQuestion' => $aQuestion,
            'aAllQuestions' => $aAllQuestions,
            'iNextIdQuestion' => $iNextIdQuestion,
            'sNextURL' => $sNextURL,
            'aReponses' => $aReponses
        ];
        $this->render('views/play.php', $aParameters);
    }

    /**
     * Renvoie la question grâce à son id
     * @param int $iIdQuestion L'id de la question
     * @param array $aQuestions Le tableau des questions
     * @return array La question
     */
    public function getQuestionById($iIdQuestion, $aQuestions)
    {
        // MISSING CODE
        return 0;
    }

    /**
     * Renvoie l'id de la question suivante
     * @param int $iIdCurrentQuestion L'id de la question en cours
     * @param array $aQuestions La liste des questions
     */
    public function getIdNextQuestion($iIdCurrentQuestion, $aQuestions)
    {
        // MISSING CODE
        return 0;
    }
}

$playController = new PlayController();
$playController->index();
