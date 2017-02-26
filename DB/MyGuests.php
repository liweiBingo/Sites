<?php
$servername = "127.0.0.1";
$username = "root";
$password = "bingo";
$dbname = "myDB";

//创建链接
$conn = new mysqli($servername, $username, $password,$dbname);

if($conn->connect_error){
    die("链接失败：". $conn->connect_error);
}

$sql = "create table video(
category_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title CHAR NOT NULL,
description CHAR NOT NULL,
thumb CHAR NOT NULL,
create_time TIMESTAMP,
status INT(1) not null default 1,
orderby int(6) 
)";
if($conn->query($sql) === true){
    echo "table  created successfully";
}else{
    echo "错误：".$conn->error;
}

$conn->close();
