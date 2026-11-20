<?php
$host = 'localhost';
$dbname = 'tp7-crud';
$username = 'root';
$password = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username, $password);
    $pdo->setAttribute(PDO::ATRR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
    die("IMpossible de se connecter a la base de donnee $dbname :".$e->getMessage());
}
?>