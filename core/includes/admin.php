<?php
require($_SERVER["DOCUMENT_ROOT"]."/RegS/core/lib/DataBase.php");
require($_SERVER["DOCUMENT_ROOT"]."/RegS/cfg/config.php");

$dataBaseHandler = new DataBase(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);
$dataBaseHandler->query("SELECT * FROM `users`", array());
$result = $dataBaseHandler->fetch(DataBase::FETCH_ALL, PDO::FETCH_ASSOC);
echo "<div class='span'><span>id</span><span>Email</span><span>Username</span><span>Role</span></div>";
$count = 1;
foreach($result as $row){
    echo "<div class='input'>";
    echo '<input type="text" name="id'.$count.'" value="' . $row["id"] . '">';
    echo '<input type="text" name="email'.$count.'" value="' . $row["email"] . '">';
    echo '<input type="text" name="username'.$count.'" value="' . $row["username"] . '">';
    echo '<input type="text" name="role'.$count.'" value="' . $row["role"] . '">';
    echo "</div>";
    $count++;
}
echo '<button type="submit" class="button">Изменить</button>';