<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['title']))
            {
                $title = $_POST['title'];

                $sql = "SELECT DISTINCT student.rollno, name FROM student,participates WHERE participates.title='{$title}' AND participates.rollno=student.rollno";
                
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($result))
                {
                    array_push($response, array("rollno"=>$row["rollno"], "name"=>$row["name"]));
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
