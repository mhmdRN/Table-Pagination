<?php

try{
    $host="localhost";
    $dbname="laragigs";
    $user="root";
    $pass="";
    $charset="utf-8";
    $dsn="mysql:host=$host;dbname=$dbname;$charset=$charset";
    $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES=>false];
    $pdo=new pdo($dsn,$user,$pass,$options);
}catch(\PDOException $e){
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}