<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <?php 
        include 'mesFonctionsSql.php';
        include 'mesFonctionsTable.php';
        $rows = getAllUsers();
        affichetable($rows, getHeaderTable());
    ?>
</body>
</html>