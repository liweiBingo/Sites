<?php
$servername = "127.0.0.1";
$username = "root";
$password = "bingo";

//创建链接
$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
    die("链接失败：". $conn->connect_error);
}


$sql = "create database myDB";
if($conn->query($sql) === true){
    echo "数据库创建成功";
}else{
    echo "Error creating database:". $conn->error;
}
$conn->close();



