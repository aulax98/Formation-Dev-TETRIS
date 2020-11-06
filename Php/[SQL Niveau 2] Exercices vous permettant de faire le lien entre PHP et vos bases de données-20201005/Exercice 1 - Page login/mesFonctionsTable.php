<?php
function affichetable($rows, $headers) {
    ?>
    <table border="1">
        <tr>
        <?php foreach ($headers as $header): ?>
            <th><?php echo $header; ?></th>
        <?php endforeach; ?>
        </tr>

        <?php foreach ($rows as $row): ?>
            <tr>
            <?php for ($k = 0; $k < count($headers); $k++): ?>
                <?php if ($k == 0){ ?>
                    <td><?php echo '<a href=formulaireUtilisateur.php?id='.$row[$k].' >'.$row[$k].'</a>'; ?></td>
                <?php } else { ?>
                    <td><?php echo $row[$k]; ?></td>
                <?php } ?>
                
            <?php endfor; ?>
            </tr>
        <?php endforeach; ?>

    </table>
    
<?php
}
    function getHeaderTable() {
        $headers = array();
        $headers[] = "ID";
        $headers[] = "Nom";
        $headers[] = "Prenom";
        $headers[] = "Pseudo";
        $headers[] = "Mail";
        return $headers;
    }
?>