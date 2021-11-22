<?php

require($_SERVER["DOCUMENT_ROOT"]."/RegS/core/lib/DataBase.php");
require($_SERVER["DOCUMENT_ROOT"]."/RegS/cfg/config.php");

$userEmail = $_POST["email"] ?? NULL;
$userPassword = $_POST["password"] ?? NULL;
$userUsername = $_POST["username"] ?? NULL;
$dataBaseHandler = new DataBase(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);

if(isset($userUsername)){
    $dataBaseHandler->query("INSERT INTO `users`(`id`, `email`, `password`, `username`) VALUES (':id',':email',':password',':username')",
    array("id" => NULL, "email" => $userEmail, "password" => $userPassword, "username" => $userUsername));
    print_r("reg");
}
else{
    $dataBaseHandler->query("SELECT * FROM users WHERE `email` = :email", array("email" => $userEmail));
    if(isset($dataBaseHandler)){
        print_r("in");
    }
    else{
        print_r("not in");
    }
}
/*
$dataBaseHandler->query("SELECT * FROM users WHERE `email` = :email", array("email" => $userEmail));
print_r($dataBaseHandler->fetch(DataBase::FETCH, PDO::FETCH_ASSOC));


$dataBaseHandler->query("SELECT * FROM users", array());
print_r($dataBaseHandler->fetch(DataBase::FETCH_ALL, PDO::FETCH_ASSOC));*/