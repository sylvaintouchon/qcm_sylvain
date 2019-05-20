<?php

$lsMessage = "";
$question = filter_input(INPUT_POST, "question");
$answer1 = filter_input(INPUT_POST, "answer1");
$answer2 = filter_input(INPUT_POST, "answer2");
$answer3 = filter_input(INPUT_POST, "answer3");
$answer_true = filter_input(INPUT_POST, "answer_true");
$categorie = filter_input(INPUT_POST, "categorie");
$submit = filter_input(INPUT_POST, "inserer");

echo $submit;

if ($question != "") {

    try {
        /*
         * Connexion
         */
        $lcnx = new PDO("mysql:host=db5000053742.hosting-data.io;dbname=dbs48645;port=3306", "dbu141495", "M2I!Chuenjai1966?");
        $lcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $lcnx->exec("SET NAMES 'UTF8'");

        /*
         * insertion dans utilisateurs
         */
        $lsSQL = "INSERT INTO questions (question, answer1, answer2, answer3, answer_true, categorie ) VALUES(?,?,?,?,?,?)";

        $lcmd = $lcnx->prepare($lsSQL);

        $lcmd->bindParam(1, $question, PDO::PARAM_STR);
        $lcmd->bindParam(2, $answer1, PDO::PARAM_STR);
        $lcmd->bindParam(3, $answer2, PDO::PARAM_STR);
        $lcmd->bindParam(4, $answer3, PDO::PARAM_STR);
        $lcmd->bindParam(5, $answer_true, PDO::PARAM_STR);
        $lcmd->bindParam(6, $categorie, PDO::PARAM_STR);


        $lcmd->execute();

        $lsMessage = $lcmd->rowcount() . " enregistrement(s) ajouté(s)";

        $lcnx = null;
    } catch (PDOException $e) {
        $lsMessage = $e->getMessage();
    }
} else {
    $lsMessage = "Toutes les saisies sont obligatoires";
}

echo $lsMessage;
?>
