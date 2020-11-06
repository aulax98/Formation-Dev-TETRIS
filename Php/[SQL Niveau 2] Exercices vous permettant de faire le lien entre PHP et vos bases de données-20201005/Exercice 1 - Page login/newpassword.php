<?php
include_once 'database.php';
$newpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$id = $_GET['id'];
if (!empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
    if ($_POST['password'] == $_POST['confirmpassword']) {
        if (preg_match('@[A-Z]@', $newpass) && preg_match('@[a-z]@', $newpass) && preg_match('@[0-9]@', $newpass) && (strlen($newpass) >= 8)) {
            $database->update('utilisateurs', ['Mdp' => $newpass], ['id' => $id]);
        } else {
            echo '<p style="color:red;">Le mot de passe doit contenir une majuscule, une minuscule, un caractère spécial (&.!*), au moins un chiffre, et au moins 8 caractère.</p>';
        }
    } else {
        echo '<p style="color:red;">Les mots de passe doivent être identiques</p>';
    }
} else {
    echo '<p style="color:red;">Veuillez renseigné le nouveau mot de passe</p>';
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Nouveau mot de passe</title>
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
            <legend class="text-dark">
                <h1>Nouveau mot de passe</h1>
            </legend>
            <form method="POST">
                <div class="form-group">
                    <label>Nouveau mot de passe:</label>
                    <input type="password" name="password" id="pass" placeholder="Password" class="form-control w-75 m-auto">
                </div>
                <div class="form-group">
                    <label>Confirmer votre mot de passe:</label>
                    <input type="password" name="confirmpassword" id="pass" placeholder="Confirmé votre password"  class="form-control w-75 m-auto">
                </div>
                <input type="submit" name="bouton" value="Confirmer" class="btn btn-primary w-75 m-auto">
            </form>
        </fieldset>
    </div>
</body>

</html>