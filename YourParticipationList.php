<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST')
    {
        
        if(isset($_POST['email']))
            {
                $email = $_POST['email'];
                $sql2 = "SELECT rollno FROM student WHERE email = '{$email}'";
                $result = mysqli_query($con, $sql2);
                $row = mysqli_fetch_array($result);
                $rollno = $row["rollno"];
                
                $sql = "SELECT * FROM `participates` WHERE `rollno` LIKE '{$rollno}'";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($result))
                {
                    array_push($response, array("title"=>$row["title"]));
                }
                
            }
        else
            {
                $response['error'] = true;
                $response['message'] = "Required Field are Missing";
            }
    }
else
    {
        $response['error'] = true;
        $response['message'] = "Invalid Request";
    }
echo json_encode($response);
?>
