<?php

declare(strict_types=1);

include_once('C:/xampp/htdocs/quizztdd/controllers/playController.php');

use PHPUnit\Framework\TestCase;

class PlayControllerTest extends TestCase
{
    public function testGetQuestionById(): void
    {
        $aQuestions = [['id' => 1, 'nom' => 'question 1'], ['id' => 2, 'nom' => 'question 2'], ['id' => 7, 'nom' => 'question 7']];
        $aExpected = ['id' => 2, 'nom' => 'question 2'];

        $playController = new PlayController();
        $aActual = $playController->getQuestionById(2, $aQuestions);

        $this->assertEquals($aExpected, $aActual);
    }

    public function testGetIdNextQuestion(): void
    {
        $aQuestions = [['id' => 1, 'nom' => 'question 1'], ['id' => 2, 'nom' => 'question 2'], ['id' => 7, 'nom' => 'question 7']];
        $iExpected = 7;

        $playController = new PlayController();
        $iActual = $playController->getIdNextQuestion(2, $aQuestions);

        $this->assertEquals($iExpected, $iActual);
    }
}