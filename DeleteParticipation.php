<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST')
    {
        
        if(isset($_POST['email']) and
            isset($_POST['title']))
            {
                $email = $_POST['email'];
                $title = $_POST['title'];
                $sql2 = "SELECT rollno FROM student WHERE email = '{$email}'";
                $result = mysqli_query($con, $sql2);
                $row = mysqli_fetch_array($result);
                $rollno = $row["rollno"];
            
                $sql = "DELETE FROM participates WHERE rollno='{$rollno}' AND title='{$title}'";
                $result = mysqli_query($con, $sql);
                
                $response['error'] = false;
                $response['message'] = "Event Participation Removed";
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
