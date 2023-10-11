<?php

include_once('db.php');

class Scores {

    public static function addScore($iScoreFinal)
    {
        $sql = "INSERT INTO scores (score) VALUES (:score)";

        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam(':score', $iScoreFinal, PDO::PARAM_INT);
        $stmt->execute();
    }
}