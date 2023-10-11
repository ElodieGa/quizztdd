<?php

declare(strict_types=1);

include_once('C:/xampp/htdocs/quizztdd/controllers/addQuestionController.php');

use PHPUnit\Framework\TestCase;

class AddQuestionControllerTest extends TestCase
{
    public function testSum(): void
    {
        $a = 2;
        $b = 3;
        $iExpected = $a + $b;

        $addQuestionsController = new AddQuestionsController();
        $iActual = $addQuestionsController->sum($a, $b);

        $this->assertEquals($iExpected, $iActual);
    }

    public function testIsFormAddQuestionEmpty(): void
    {
        $bExpected = false;

        $aForm = [];

        $addQuestionsController = new AddQuestionsController();
        $bActual = $addQuestionsController->isFormAddQuestionFilled($aForm);

        $this->assertEquals($bExpected, $bActual);
    }

    public function testIsFormAddQuestionNotFullyFilled(): void
    {
        $bExpected = false;

        $aForm = [
            'nouvelle_question' => 'Une nouvelle question',
            'vraie_reponse' => 'Une bonne réponse',
            'fausse_reponse_2' => 'Une mauvaise réponse 2',
            'fausse_reponse_3' => 'Une mauvaise réponse 3'
        ];

        $addQuestionsController = new AddQuestionsController();
        $bActual = $addQuestionsController->isFormAddQuestionFilled($aForm);

        $this->assertEquals($bExpected, $bActual);
    }

    public function testIsFormAddQuestionFilled(): void
    {
        $bExpected = true;

        $aForm = [
            'nouvelle_question' => 'Une nouvelle question',
            'vraie_reponse' => 'Une bonne réponse',
            'fausse_reponse_1' => 'Une mauvaise réponse 1',
            'fausse_reponse_2' => 'Une mauvaise réponse 2',
            'fausse_reponse_3' => 'Une mauvaise réponse 3'
        ];

        $addQuestionsController = new AddQuestionsController();
        $bActual = $addQuestionsController->isFormAddQuestionFilled($aForm);

        $this->assertEquals($bExpected, $bActual);
    }
}