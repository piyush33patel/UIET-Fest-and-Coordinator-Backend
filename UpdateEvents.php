<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['about']) and 
            isset($_POST['date']) and
                isset($_POST['venue']) and
                    isset($_POST['begin']) and
                            isset($_POST['finish']) and
                                isset($_POST['title']))
    {
        $about = $_POST['about'];
        $date = $_POST['date'];
        $venue = $_POST['venue'];
        $begin = $_POST['begin'];
        $finish = $_POST['finish'];
        $title = $_POST['title'];
        
        
        $sql = "UPDATE `events` SET `about` = '{$about}', `date` = '{$date}', `venue` = '{$venue}', `begin` = '{$begin}',`finish` = '{$finish}' WHERE `events`.`title` = '{$title}'";
        $result = mysqli_query($con, $sql);
        
        if(mysqli_affected_rows($con) > 0) 
        {
            $response['error'] = false;
            $response['message'] = "UPDATION SUCCESSFUL";
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "COULD NOT DO IT. TRY AGAIN LATER.";
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

