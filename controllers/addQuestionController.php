<?php

include_once('C:/xampp/htdocs/quizztdd/config/config.php');
include_once(ROOT . 'controllers/controller.php');
include_once(ROOT . 'models/questions.php');
include_once(ROOT . 'models/reponses.php');

class AddQuestionsController extends Controller {

    /**
     * Stocke la nouvelle question en base de données, si celle-ci est envoyée
     * @return array Renvoie un message de succès ou d'erreur
     */
    public function index()
    {
        $oQuestions = new Questions();
        $sSuccess = "";
        $sError = "";

        if (!empty($_POST)) {
            //Si on a envoyé une nouvelle question, la stocker en BDD
            if ($this->isFormAddQuestionFilled($_POST)) {
                $iIdQuestion = $oQuestions->addQuestion($_POST['nouvelle_question']);

                $oReponses = new Reponses();
                $oReponses->setReponses($_POST);
                $oReponses->saveReponses($iIdQuestion);

                $sSuccess = "Question ajoutée dans la base de données !";
            } else {
                $sError = "Veuillez remplir tous les champs";
            }
        }

        $aParameters = ['sSuccess' => $sSuccess, 'sError' => $sError];
        $this->render('views/addQuestion.php', $aParameters);
    }

    /**
     * Vérifie si le formulaire est totalement rempli ou non
     * @param array $aForm  Le formulaire envoyé sous la forme suivante :
     *                      [
     *                          'nouvelle_question' => '',
     *                          'vraie_reponse' => '',
     *                          'fausse_reponse_1' => '',
     *                          'fausse_reponse_2' => '',
     *                          'fausse_reponse_3' => ''
     *                      ]
     * @return boolean Renvoie un booléen indiquant si le formulaire est rempli ou pas
     */
    public function isFormAddQuestionFilled($aForm)
    {
        $aChampsForm = ['nouvelle_question', 'vraie_reponse', 'fausse_reponse_1', 'fausse_reponse_2', 'fausse_reponse_3'];

        foreach ($aChampsForm as $sChamp) {
            if (empty($aForm[$sChamp])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Calcule la somme de deux nombres
     * @param int $a Le premier nombre
     * @param int $b Le deuxième nombre
     * @return int La somme des deux nombres
     */
    public function sum($a, $b) {
        return $a + $b;
    }
}

$addQuestionsController = new AddQuestionsController();
$addQuestionsController->index();
