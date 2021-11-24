<?php
require($_SERVER["DOCUMENT_ROOT"]."/RegS/core/lib/DataBase.php");
require($_SERVER["DOCUMENT_ROOT"]."/RegS/cfg/config.php");

$dataBaseHandler = new DataBase(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);

$dataBaseHandler->query("SELECT COUNT(*) FROM `users`",array());
$result = $dataBaseHandler->fetch(DataBase::FETCH, PDO::FETCH_ASSOC);
for($i = 1; $i <= $result; $i++){
    $userId = $_POST["id".$i] ?? NULL;
    $userEmail = $_POST["email".$i] ?? NULL;
    $userUsername = $_POST["username".$i] ?? NULL;
    $userRole = $_POST["role".$i] ?? NULL;

    $dataBaseHandler->query("UPDATE `users` SET `id` = :id, `email` = :email, `username` = :username, `role` = :role",
    array("id" => $userId, "email" => $userEmailm, "username" => $userUsername, "role" => $userRole));
}