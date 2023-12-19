<?php
$dsn = 'mysql:dbname=tutor;host=unj-labo.com';
$user = "takanomeore";
$pwd = "takanome456@PyUser";

try{
    $dbh = new PDO($dsn,$user,$pwd);
    echo "connection succeeded";
} catch(PDOEXception $e) {
    echo $e->getMessage()+"\n";
}