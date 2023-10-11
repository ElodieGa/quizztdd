<?php

include_once('db.php');

class Reponses {
    private $aReponses = [];

    public static function getReponsesByIdQuestion($iIdQuestion)
    {
        $sql = "SELECT reponses.id, reponses.nom, reponses.is_correct, reponses.id_question
                FROM reponses
                WHERE reponses.id_question = :id_question";

        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam(':id_question', $iIdQuestion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setReponses($aReponses)
    {
        $aChampsForm = ['fausse_reponse_1', 'fausse_reponse_2', 'fausse_reponse_3'];

        $this->aReponses[$aReponses['vraie_reponse']] = 1;

        foreach ($aChampsForm as $aChamp) {
            $this->aReponses[$aReponses[$aChamp]] = 0;
        }
    }

    /**
     * Pour chaque réponse dans la variable $this->aReponses, on ajoute celle-ci en base de donnée
     * @param int $iIdQuestion L'id de la question auxquelles les réponses vont être liées
     */
    public function saveReponses($iIdQuestion)
    {
        foreach ($this->aReponses as $sNomReponse => $bIsCorrect) {
            $this->addReponse($sNomReponse, $bIsCorrect, $iIdQuestion);
        }
    }

    public function addReponse($sNomReponse, $bIsCorrect, $iIdQuestion)
    {
        $sql = "INSERT INTO reponses (nom, is_correct, id_question) VALUES (:nom, :is_correct, :id_question)";

        $stmt = Db::getInstance()->prepare($sql);
        $stmt->bindParam(':nom', $sNomReponse, PDO::PARAM_STR);
        $stmt->bindParam(':is_correct', $bIsCorrect, PDO::PARAM_INT);
        $stmt->bindParam(':id_question', $iIdQuestion, PDO::PARAM_INT);
        $stmt->execute();
    }
}