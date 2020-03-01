<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['email']))
            {
                $email = $_POST['email'];
                $sql = "SELECT * FROM student WHERE email LIKE '{$email}'";
                
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                
                $response["name"]=$row["name"];
                $response["rollno"]=$row["rollno"];
                
                $response["department"]=$row["department"];
                $response["branch"]=$row["branch"];
                $response["year"]=$row["year"];
                
                
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
