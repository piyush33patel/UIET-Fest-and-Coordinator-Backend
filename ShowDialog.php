<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$response = array();
$counter=0;
$response_count = array();
if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['email']) and isset($_POST['title']))
            {
                
                $email = $_POST['email'];
                $sql2 = "SELECT rollno FROM student WHERE email = '{$email}'";
                $result = mysqli_query($con, $sql2);
                $row = mysqli_fetch_array($result);
                $rollno = $row["rollno"];
                
                $title = $_POST['title'];
                $sql = "SELECT * FROM `participates` WHERE `rollno` LIKE '{$rollno}' AND `title` LIKE '{$title}'";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($result))
                {
                    $counter++;
                    array_push($response, array("rollno"=>$row["rollno"],"title"=>$row["title"]));
                }
                
                $response_count['count'] = $counter;
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
$response_count['count'] = $counter;
echo json_encode($response_count);
?>
