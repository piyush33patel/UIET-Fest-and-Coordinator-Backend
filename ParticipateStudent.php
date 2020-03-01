<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
require_once dirname(__FILE__).'/Participate.php';
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['email']) and 
            isset($_POST['title']))
    {
        //operate further
        $db = new Participate();
        
        $email = $_POST['email'];
        $sql2 = "SELECT rollno FROM student WHERE email = '{$email}'";
        $result = mysqli_query($con, $sql2);
        $row = mysqli_fetch_array($result);
        $rollno = $row["rollno"];
        
        if($db->InsertData($rollno, $_POST['title']))
        {
            $response['error'] = false;
            $response['message'] = "Participation Successful";
        }
        else{
            $response['error'] = true;
            $response['message'] = "Participation Not Successful";
        }
    }
else{
    $response['error'] = true;
    $response['message'] = "Required Field are Missing";
}
}
else{
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}
echo json_encode($response);

?>
