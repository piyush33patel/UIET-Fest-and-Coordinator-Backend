<?php
class DBOperation{
    private $con;
    function __construct(){
        require_once dirname(__FILE__).'/DBConnect.php';
        $db = new DBConnect();
        $this->con = $db->connect();
    }
    function InsertData($rollno, $name, $department, $branch, $year, $email){
        $stmt = $this->con->prepare("INSERT INTO `student` (`rollno`, `name`, `department`, `branch`, `year`, `email`) VALUES (?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("ssssss", $rollno, $name, $department, $branch, $year, $email);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}
?>
