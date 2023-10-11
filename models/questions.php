<?php

include_once('db.php');

class Questions {
    private $aQuestions = [];

    public function __construct()
    {
        $this->aQuestions = $this->setupQuestions();
    }

    public function setupQuestions()
    {
        $sql = "SELECT questions.id, questions.nom
                FROM questions
                ORDER BY questions.id";

        $stmt = Db::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        return $this->aQuestions;
    }

    public function addQuestion($sQuestion)
    {
        $sql = "INSERT INTO questions (nom) VALUES (:nom_question)";

        $oDb = Db::getInstance();
        $stmt = $oDb->prepare($sql);
        $stmt->bindParam(':nom_question', $sQuestion, PDO::PARAM_STR);
        $stmt->execute();
        return $oDb->lastInsertId();
    }
}