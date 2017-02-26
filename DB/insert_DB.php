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
/*
$sql = "insert into MyGuests(firstname, lastname, email)
    values('john', 'Doe','john@example.com')";
if($conn->query($sql) === true){
    echo "新纪录插入成功";
}else{
    echo "Error:". $sql. "<br>". $conn->error;
}
 */
//预处理和绑定
$stmt = $conn->prepare("insert  into MyGuests (firstname, lastname,email)values(?,?,?)");
$stmt->bind_param('sss', $firatname, $lastname,$email);

$firatname = "Mary";
$lastname = "Moei";
$email = "john@s63.com";
$stmt->execute();

$firatname = "Julie";
$lastname = "Dooley";
$email = "julie@163.com";
$stmt->execute();

$conn->close();
