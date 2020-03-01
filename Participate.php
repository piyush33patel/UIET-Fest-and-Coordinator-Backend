<?php
class Participate{
    private $con;
    function __construct(){
        require_once dirname(__FILE__).'/DBConnect.php';
        $db = new DBConnect();
        $this->con = $db->connect();
    }
    function InsertData($rollno, $title){
        $stmt = $this->con->prepare("INSERT INTO `participates` (`id`, `rollno`, `title`) VALUES (NULL , ?, ?);");
        $stmt->bind_param("ss", $rollno, $title);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}
?>
