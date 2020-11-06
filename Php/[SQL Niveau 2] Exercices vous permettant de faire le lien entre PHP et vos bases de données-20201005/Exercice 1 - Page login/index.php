<?php
include_once 'database.php';
if (isset($_POST['bouton'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);
    $date = date('Y-m-d H:i:s');
    if (!empty($_POST['mail']) && !empty($_POST['password'])) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            /* $user = 'root';
            $pass = '';
            $basedonnees = new PDO('mysql:host=localhost;dbname=exercice1n2', $user, $pass);
            $reqmail = $basedonnees->prepare("SELECT count(*) FROM utilisateurs WHERE Mail = ?");
            $reqmail->execute(array($mail));
            $exist = $reqmail->fetch(); */
            $req = $database->get('utilisateurs', '*', ['Mail' => $mail]);
            if ($req != 0) {
                date_default_timezone_set('Europe/Paris');
                setlocale(LC_TIME, "fr_FR.UTF-8", "French_France.1252");
                $date = date('Y-m-d H:i:s');
                /*$requete = "INSERT INTO connexions (`E-mail`, Passwords, Dates) VALUES ('$mail', '$password', '$date')";
                $basedonnees -> query($requete);
                $reqmdp = $basedonnees->prepare("SELECT Mdp FROM utilisateurs WHERE Mail = ?");
                $reqmdp->execute(array($mail));
                $row = $reqmdp->fetch(); */
                $database->insert('connexions', [
                    'Email' => $mail,
                    'Passwords' => $password,
                    'Dates' => $date,
                ]);
                $passCheck = password_verify($password, $req["Mdp"]);
                if ($passCheck == true) {
                    $_SESSION['mail'] = $mail;
                    header('location: home.php');
                } else {
                    echo "<script>alert(\"E-Mail, Mots de passe combinaison incorrect!\")</script>";
                }
            } else {
                echo "<script>alert(\"E-Mail, Mots de passe combinaison incorrect!\")</script>";
            }
        } else {
            echo 'Adresse mail non valide';
        }
    } else {
        echo "Tous les champs doivent être remplis";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Connexion</title>
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
                <h1 class="text-dark">Connexion</h1>
            </legend>
            <form method="POST">
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="mail" name="mail" id="mail" placeholder="Monmail@gmail.com" class="form-control w-75 m-auto">
                </div>
                <div class="form-group">
                    <label class="text-right">Mot de passe:</label>
                    <input type="password" name="password" id="pass" placeholder="Votre mot de passe" class="form-control w-75 m-auto">
                </div>
                <div class="form-group">
                    <input type="submit" name="bouton" value="Valider" class="btn btn-primary my-3 w-75"><br>
                    <a href="resetpassword.php" class="text-dark">Mot de passe oublié</a>
                </div>
            </form>
        </fieldset>
    </div>
</body>

</html>