<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/2/13
 * Time: 下午9:16
 */
class Db{

    static private $_instance;
    static private $_connectSource;

    static private $servername = "127.0.0.1";
    static private $username = "root";
    static private $password = "bingo";
    static private $dbname = "myDB";
//    private $_dbConfig = array(
//
//        "host"=>"127.0.0.1",
//        "user"=>"root",
//        "password"=>"bingo",
//        "database"=>"test",
//    );
    private function __construct(){

    }
    static public function getInstance(){
        if (!self::$_instance instanceof self){
            self::$_instance =  new self();
        }
        return self::$_instance;
    }
    public function connect(){
        if (!self::$_connectSource)
        {
            self::$_connectSource = new mysqli(self::$servername,
            self::$username,
                self::$password,
                self::$dbname);
            if (self::$_connectSource->connect_error){

                //die("mysql connect error:". self::$_connectSource->connect_error);
                throw new Exception("mysql connect error:". self::$_connectSource->connect_error);
            }
          // mysqli_query(self::$_connectSource, "set names UTF8");
            self::$_connectSource->query("set names UTF8");
        }

    return self::$_connectSource;
    }
}
/*
$connect =  Db::getInstance()->connect();
$sql = "select *from MyGuests";
$result = $connect->query($sql);

while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"];
    }

//echo "<br>". mysqli_num_rows($result);
//var_dump($connect);

*/

