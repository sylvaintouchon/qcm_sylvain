<!-- play_qcm.php -->

<html>
    <head>
        <title>play_qcm</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="lib/boostrap/css/bootstrap.css">
       
    </head>

    <body>
        <div class="ml-md-5">

            <?php
// connexion à la base
            $DBH = new PDO("mysql:host=db5000053742.hosting-data.io;dbname=dbs48645;port=3306", "dbu141495", "M2I!Chuenjai1966?");


// extraction du nombre de lignes de la table
            $STH = $DBH->prepare("SELECT COUNT(*) from questions ");
            $STH->execute();
            $result = $STH->fetch();
            $count = $result ["COUNT(*)"];

// selection aléatoire d'un id question
            $id_question = rand(1, $count);



// selection bonne réponse
            $STH = $DBH->prepare("select answer_true from questions where id = $id_question");
            $STH->execute();
            $result = $STH->fetch();
            $answer_true = $result ["answer_true"];


// selection question
            $STH = $DBH->prepare("select question from questions where id = $id_question");
            $STH->execute();
            $result = $STH->fetch();
            $question = $result ["question"];

// selection réponse 1
            $STH = $DBH->prepare("select answer1 from questions where id = $id_question");
            $STH->execute();
            $result = $STH->fetch();
            $answer1 = $result ["answer1"];

// selection réponse 2
            $STH = $DBH->prepare("select answer2 from questions where id = $id_question");
            $STH->execute();
            $result = $STH->fetch();
            $answer2 = $result ["answer2"];

// selection réponse 3
            $STH = $DBH->prepare("select answer3 from questions where id = $id_question");
            $STH->execute();
            $result = $STH->fetch();
            $answer3 = $result ["answer3"];

//fermeture de la base
            $DBH = null;


            echo "<br><br>" . 'question ' . $id_question . ': ' . $question . $answer_true . "<br>";
            ?>


            <form method="POST" action="">
                <br>
                <input type="radio" id="contactChoice1" name="answer" value="1">
                <label for="contactChoice1"><?php echo $answer1; ?></label>
                <br>

                <input type="radio" id="contactChoice2" name="answer" value="2">
                <label for="contactChoice2"><?php echo $answer2; ?></label>
                <br>
                <input type="radio" id="contactChoice3" name="answer" value="3">
                <label for="contactChoice3"><?php echo $answer3; ?></label>
                <br>
                <input type = submit value="envoyer" />
            </form>
            <?php
// désaffecte la valeur $answer           
            $answer = 0;

            $answer = filter_input(INPUT_POST, 'answer');


//            if ($answer != 1 OR $answer != 2 OR $answer != 3) {
                if ($answer == $answer_true) {
                    echo "<br>bonne réponse";
                    echo 'la réponse que vous avez donné: est: ' . $answer;
                    echo '<br>la bonne réponse est: ' . $answer_true;
                } else {
                    echo 'mauvaise réponse, la bonne réponse était ' . $answer_true;
                    
                }
//            }
            ?>

            <br><br>
            <a href="http://levillageinformatique.fr/developpeur/qcm/play_qcm.php">suivant</a>
        </div>




    </body>