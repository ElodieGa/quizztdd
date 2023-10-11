<?php

include_once('db.php');

class ReponsesUser {

    public static function addReponseUser($iIdQuestion, $iIdReponse)
    {
        $sql = "INSERT INTO reponses_user (id_question, id_reponse) VALUES (:id_question, :id_reponse)";

        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam(':id_question', $iIdQuestion, PDO::PARAM_INT);
        $stmt->bindParam(':id_reponse', $iIdReponse, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function getAllReponses()
    {
        $sql = "SELECT is_correct
                FROM reponses_user
                INNER JOIN reponses ON reponses_user.id_reponse = reponses.id";

        $stmt = Db::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public static function deleteReponses()
    {
        $sql = "DELETE FROM reponses_user";

        $stmt = Db::getInstance()->prepare($sql);
        $stmt->execute();
    }
}