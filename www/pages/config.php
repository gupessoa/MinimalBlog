<?php
    $pdo;
    try{
        $pdo = new PDO("mysql:dbname=tombo;host=localhost", "root", "");
    }catch(PDOException $e){
        echo "Erro: "+$e->getMessage();
    }
?>