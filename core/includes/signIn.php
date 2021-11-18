<?php

require($_SERVER["DOCUMENT_ROOT"]."/RegS/core/lib/DataBase.php");
require($_SERVER["DOCUMENT_ROOT"]."/RegS/cfg/config.php");

$userEmail = $_POST["email"] ?? "fqwefwqef";
$userPassword = $_POST["password"] ?? "быдло";


$dataBaseHandler = new DataBase(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);


$dataBaseHandler->query("SELECT * FROM users WHERE `email` = :email", array("email" => $userEmail));
print_r($dataBaseHandler->fetch(DataBase::FETCH, PDO::FETCH_ASSOC));


$dataBaseHandler->query("SELECT * FROM users", array());
print_r($dataBaseHandler->fetch(DataBase::FETCH_ALL, PDO::FETCH_ASSOC));