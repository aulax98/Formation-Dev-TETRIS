<?php
session_start();
include_once 'database.php';
if (isset($_POST['bouton'])) {
    if (!empty($_POST['mail'])) {
        $mail = $_POST['mail'];
        /* $user = 'root';
        $pass = '';
        $bdd = new PDO('mysql:host=localhost;dbname=exercice1n2', $user, $pass);
        $reqsql = $bdd->prepare("SELECT * FROM utilisateurs WHERE Mail = ?");
        $result = $reqsql->execute(array($mail)); */
        $req = $database->get('utilisateurs', '*', ['Mail' => $mail]);
        include "sendemail.php";
        if ($req) {
            $id = $req['id'];
            $token = bin2hex(random_bytes(32));
            $to = $mail;
            $subject = "Votre lien de réinitialisation du mot de passe";
            $body = "Voici votre lien de réinitialisation du mot de passe <a href='http://localhost/%5bSQL%20Niveau%202%5d%20Exercices%20vous%20permettant%20de%20faire%20le%20lien%20entre%20PHP%20et%20vos%20bases%20de%20données-20201005/Exercice%201%20-%20Page%20login/newpassword.php?token=" . $token . "&id=" . $id . "'>ici</a>";
            send_mail($to, $subject, $body);
        }
    } else {
        echo "Veuillez saisir votre adresse mail";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
    <style>
        .formulaire {
            width: 75%;
        }

        @media screen and (min-width: 992px) {
            .formulaire {
                width: 25%;
            }
        }
    </style>
</head>

<body class="bg-white m-5">
    <div class="m-auto shadow-lg rounded p-3 mb-5 formulaire bg-white">
        <fieldset class="text-center">
            <legend>
                <h1 class="text-dark">Mot de passe oublié</h1>
            </legend>
            <form action="resetpassword.php" method="POST">
            <div class="form-group">
                <label>E-mail:</label>
                <input type="mail" name="mail" placeholder="E-mail" class="form-control w-75 m-auto">
            </div>
                <input type="submit" name="bouton" value="Envoyer" class="btn btn-primary my-3 w-75">
            </form>
        </fieldset>
    </div>
</body>

</html>