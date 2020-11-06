<?php 
    include_once 'Medoo.php';
    use Medoo\Medoo;
    $database = new Medoo(['database_type' => 'mysql',
    'database_name' => 'exercice1n2',         
    'server' => 'localhost',         
    'username' => 'root',
    'password' => ''     
    ]);
?>