<?php
function affichetable($usersData, $headers)
{
?>
    <table border="1">
        <tr>
            <?php foreach ($headers as $header) : ?>
                <th><?php echo $header; ?></th>
            <?php endforeach; ?>
        </tr>

        <?php foreach ($usersData as $row) : ?>
            <tr>
                <?php foreach ($headers as $header) : ?>
                    <td><?php echo $row[$header]; ?></td>
                <?php endforeach; ?>
                <!-- ici bouton modifier et supprimer -->
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="userId" value="<?php echo $row['id'] ?>"><button type="submit">Modifier</button>
                    </form>
                    <form action="home.php" method="POST">
                        <input type="hidden" name="userId" value="<?php echo $row['id'] ?>"><button type="submit" name="delData">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

<?php
}
function getHeaderTable()
{
    $headers = array();
    $headers[] = "id";
    $headers[] = "Nom";
    $headers[] = "Prenom";
    $headers[] = "Pseudo";
    $headers[] = "Mail";
    $headers[] = "Statut";
    return $headers;
}
?>