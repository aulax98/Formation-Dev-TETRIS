<?php
include_once 'database.php';
if (isset($_POST['bouton'])) {
    $verif = htmlspecialchars($_POST['password']);
    $mail = htmlspecialchars($_POST['mail']);
    $pseudo = htmlspecialchars($_POST['login']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['login']);
    $mail = htmlspecialchars($_POST['mail']);
    $verif = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $statut = htmlspecialchars($_POST['statut']);
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['mail']) && !empty($_POST['password']) && isset($_POST['statut'])) {
        if ($_POST['password'] == $_POST['confirm']) {
            if (isset($_POST['conditions'])) {
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    /*$user = 'root';
                    $pass = '';
                    $basedonnees = new PDO('mysql:host=localhost;dbname=exercice1n2;', $user, $pass);
                    $reqmail = $basedonnees->prepare("SELECT * FROM utilisateurs WHERE Mail = ?");
                    $reqmail->execute(array($mail));
                    $exist = $reqmail->rowCount();
                    $reqpsd = $basedonnees->prepare("SELECT * FROM utilisateurs WHERE Pseudo = ?");
                    $reqpsd->execute(array($pseudo));
                    $existpsd = $reqpsd->rowCount();*/
                    $req = $database->select('utilisateurs', '*', ['Mail' => $mail]);
                    $reqlog = $database->select('utilisateurs', '*', ['Pseudo' => $pseudo]);
                    if ($req != 0) {
                        if ($reqlog != 0) {
                            if (preg_match('@[A-Z]@', $verif) && preg_match('@[a-z]@', $verif) && preg_match('@[0-9]@', $verif) && (strlen($verif) >= 8)) {
                                /*$requete = "INSERT INTO utilisateurs (Nom, Prenom, Pseudo, Mail, Mdp, Statut) values ('$nom', '$prenom', '$pseudo', '$mail', '$verif', $statut)";
                                $basedonnees -> query($requete); */
                                $reqinsert = $database->insert('utilisateurs', [
                                    'Nom' => $nom,
                                    'Prenom' => $prenom,
                                    'Pseudo' => $pseudo,
                                    'Mail' => $mail,
                                    'Mdp' => $verif,
                                    'Statut' => $statut
                                ]);
                            } else {
                                echo '<p style="color:red;">Le mot de passe doit contenir une majuscule, une minuscule, un caractère spécial (&.!*), au moins un chiffre, et au moins 8 caractère.</p>';
                            }
                        } else {
                            echo '<p style="color:red;">Pseudo deja utilisé</p>';
                        }
                    } else {
                        echo '<p style="color:red;">Adresse mail déja utilisée</p>';
                    }
                } else {
                    echo "<p style='color:red;'>L'adresse mail n'est pas valide</p>";
                }
            } else {
                echo "<p style='color:red;'>* Vous devez accepter les conditions d'utilisations</p>";
            }
        } else {
            echo '<p style="color:red;">Les mots de passe doivent être identiques</p>';
        }
    } else {
        echo '<p style="color:red;">Tout les champs doivent être renseignés</p>';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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

<body class="bg-white mt-5">
    <div class="shadow-lg rounded p-3 mb-5 bg-white formulaire m-auto">
        <fieldset class="text-center">
            <legend>
                <h1>Inscription</h1>
            </legend>
            <form method="post">
                <div class="form-group">
                    <label>Nom:</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom" class="form-control w-75 m-auto"></label>
                </div>
                <div class="form-group">
                    <label>Prenom:</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Prenom" class="form-control w-75 m-auto"></label>
                </div>
                <div class="form-group">
                    <label>Pseudo:</label>
                    <input type="text" name="login" id="login" placeholder="Pseudo" class="form-control w-75 m-auto"></label>
                </div>
                <div class="form-group">
                    <label>Adresse E-mail:</label>
                    <input type="email" name="mail" id="mail" placeholder="Email" class="form-control w-75 m-auto"></label>
                </div>
                <div class="form-group">
                    <label>Mot de passe:</label>
                    <input type="password" name="password" id="pass" placeholder="Mot de passe" class="form-control w-75 m-auto"></label>
                </div>
                <div class="form-group">
                    <label>Confirmez votre Mot de passe:</label>
                    <input type="password" name="confirm" id="confirme" placeholder="Confirmer votre Mot de passe" class="form-control w-75 m-auto"></label>
                </div>
                <div class="form-group">
                    <input type="radio" name="statut" value="0" class="m-auto">
                    <label>Particulier</label><br><br>
                    <input type="radio" name="statut" value="1" class="m-auto">
                    <label>Professionel</label><br><br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="conditions"><label>* Je reconnais avoir pris connaissance des conditions d’utilisation et y adhère totalement</label><br><br>
                    <button type="submit" name="bouton" value="Valider" class="btn btn-primary">Valider</button><br><br>
            </form>
        </fieldset>
    </div>
</body>

</html>