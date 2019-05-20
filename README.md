# qcm_sylvain

attention il faut mettre le fichier de config 

<?php

// connexion à la base
            $DBH = new PDO("mysql:host=XXXXX;dbname=XXXX;port=3306", "XXXXXXX", "XXXXXXXXX");




// selection aléatoire d'un id question
            $id_question = rand(1, $count);



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
            
            
// selection bonne réponse
            $STH = $DBH->prepare("select answer_true from questions where id = $id_question");
            $STH->execute();
            $result = $STH->fetch();
            $answer_true = $result ["answer_true"];
                        

//fermeture de la base
            $DBH = null;
            
           
