<?php
require_once dirname(__FILE__).'/DBOperation.php';
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['rollno']) and 
            isset($_POST['name']) and
                isset($_POST['department']) and
                    isset($_POST['branch']) and
                        isset($_POST['year']) and
                                isset($_POST['email']) 
            )
    {
        //operate further
        $db = new DBOperation();
        
        if($db->InsertData($_POST['rollno'], $_POST['name'],$_POST['department'],$_POST['branch'],$_POST['year'],$_POST['email'] ))
        {
            $response['error'] = false;
            $response['message'] = "USER REGISTERED";
        }
        else{
            $response['error'] = true;
            $response['message'] = "USER NOT RESGISTERED";
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
