<?php

declare(strict_types=1);

include_once('C:/xampp/htdocs/quizztdd/controllers/scoreController.php');

use PHPUnit\Framework\TestCase;

class ScoreControllerTest extends TestCase
{
    public function testCalculateScore(): void
    {
        $aScores = [1, 1, 1, 0, 0];
        $iExpected = 3;

        $scoreController = new ScoreController();
        $iActual = $scoreController->calculateScore($aScores);

        $this->assertEquals($iExpected, $iActual);
    }

    public function testCalculateScoreWithEmptyArray(): void
    {
        $aScores = [];
        $iExpected = 0;

        $scoreController = new ScoreController();
        $iActual = $scoreController->calculateScore($aScores);

        $this->assertEquals($iExpected, $iActual);
    }

    public function testGetLastIdQuestion(): void
    {
        $aQuestions = [['id' => 1, 'nom' => 'question 1'], ['id' => 2, 'nom' => 'question 2'], ['id' => 7, 'nom' => 'question 7']];
        $iExpected = 7;

        $scoreController = new ScoreController();
        $iActual = $scoreController->getLastIdQuestion($aQuestions);

        $this->assertEquals($iExpected, $iActual);
    }

    public function testGetLastIdQuestionWithWrongData(): void
    {
        $aQuestions = [[1, 'question 1'], [2, 'question 2'], [7, 'question 7']];
        $iExpected = false;

        $scoreController = new ScoreController();
        $iActual = $scoreController->getLastIdQuestion($aQuestions);

        $this->assertEquals($iExpected, $iActual);
    }

    public function testGetLastIdQuestionReturnsInt(): void
    {
        $aQuestions = [['id' => 1, 'nom' => 'question 1'], ['id' => 2, 'nom' => 'question 2'], ['id' => 7, 'nom' => 'question 7']];
        $sExpected = 'integer';

        $scoreController = new ScoreController();
        $iLastIdQuestion = $scoreController->getLastIdQuestion($aQuestions);
        $sActual = gettype($iLastIdQuestion);

        $this->assertEquals($sExpected, $sActual);
    }
}