<?php

require("./core/lib/DataBase.php");
require("./cfg/config.php");

$userEmail = $_POST["email"] ?? "";
$userPassword = $_POST["password"] ?? "";


$dataBaseHandler = new DataBase(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);

$dataBaseHandler->query("SELECT * FROM ".DB_NAME."WHERE `email` = :email", array("email" => $userEmail));
$fetcher = $dataBaseHandler->getFetcher();

echo $fetcher->fetch(PDO::FETCH_ASSOC);