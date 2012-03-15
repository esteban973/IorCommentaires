<?php


$user="root";
$password="";
$dsn="mysql:host=localhost;dbname=ior";
// connexion à la base de données
try{
    $connexion=new PDO($dsn, $user, $password);
} catch (PDOException $e){
    print 'Erreur '.$e->getMessage();
    die();
}


?>
