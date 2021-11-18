<?php
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];

$mysql = new mysqli('localhost','root','','regdb');
$mysql->query("SET NAMES 'utf8'");
if($mysql->connect_error){
    echo $mysql->connect_errno.'<br>'.$mysql->connect_error;
}
else{
    if(isset($username)){
        $mysql->query("INSERT INTO `users`(`id`, `email`, `password`, `username`) VALUES (NULL','{$email}','{$password}','{$username}')");
        echo 'Вы зарегестрированы!';
    }
    else{
        $result = $mysql->query("SELECT * FROM `users`");
        $check = true;
        while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
            if($row['username'] == $username && $row['password'] == $password){
                $check = false;
            }
        }
        if($check){
            echo 'Ошибка входа! Проверьте введённые данные';
        }
        else{
            echo 'Вы вошли';
        }
    }
}

$mysql->close();