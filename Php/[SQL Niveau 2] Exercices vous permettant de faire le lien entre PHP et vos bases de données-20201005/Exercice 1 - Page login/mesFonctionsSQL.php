<?php
    include_once 'Medoo.php';
    use Medoo\Medoo;
    function dbinit(){

        $database = new Medoo(['database_type' => 'mysql',
        'database_name' => 'exercice1n2',         
        'server' => 'localhost',         
        'username' => 'root',
        'password' => ''     
        ]);
        return $database;
    }

    function getAllUsers(){
        /* $con = getDatabaseConnexion();
        $requete = 'SELECT * FROM utilisateurs';    
        $rows = $con->query($requete); */
        $usersData = dbinit()->select('utilisateurs', [
            'id',
            'Nom',
            'Prenom',
            'Pseudo',
            'Mail', 
            'Statut'
        ]);
        return $usersData;
    }
    function readUser($id){
        /* $con = getDatabaseConnexion();
        $requete = "SELECT * FROM utilisateurs WHERE id = '$id'";
        $stmt = $con->query($requete); */
        /* $row = $stmt->fetchAll(); */
        /* if(!empty($row)){
            return $row[0];
        } */
        $usersData = dbinit()->get('utilisateurs', [
            'id',
            'Nom',
            'Prenom',
            'Pseudo',
            'Mail', 
            'Statut'
        ]);
        if(!empty($usersData)){
            return $usersData;
        }
        
    }
    function createUser($nom, $prenom, $pseudo, $mail, $statut){
        /* try{
            $con = getDatabaseConnexion();
            $sql = "INSERT INTO utilisateurs (Nom, Prenom, Pseudo, Mail, Statut) 
                    VALUES ('$nom', '$prenom', '$pseudo', '$mail', '$statut')";
                    $con->exec($sql);
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        } */
    }
    function updateUser($id, $nom, $prenom, $pseudo, $mail, $statut){
        /* try{
            $con = getDatabaseConnexion();
            $requete = "UPDATE utilisateurs SET
                    Nom = '$nom'
                    Prenom = '$prenom'
                    Pseudo = $pseudo, 
                    Mail = $mail, 
                    Statut = $statut
                    WHERE id = '$id' ";
            $stmt = $con->query($requete);
        }catch(PDOException $e){
            echo $requete . "<br>" . $e->getMessage();
        } */
    }
    function deleteUser($id){
        /* try{
            $con = getDatabaseConnexion();
            $requete = "DELETE from utilisateurs where id => '$id'";
            $stmt = $con->query($requete);
        }catch(PDOException $e){
            echo $requete . "<br>" . $e->getMessage();
        } */
        dbinit()->delete('utilisateurs', ['id' => $id]);
    }
?>