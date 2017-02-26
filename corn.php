<?php

$servername = "127.0.0.1";
$username = "root";
$password = "bingo";
$dbname = "test";

$conn = new mysqli($servername, $username,$password, $dbname);

if($conn->connect_error){
    die("链接失败：". $conn->connect_error);
}
$sql = "INSERT INTO category(category_id,name,parent_id,path,create_time,update_time) VALUES(2,'bingo',13,'asasdf',2390,2015)";
if($conn->query($sql) === TRUE)
{
    echo "成功";
}else{
    echo "Error:". $sql . "<br>" . $conn->error;
}
$conn->close();

?>
