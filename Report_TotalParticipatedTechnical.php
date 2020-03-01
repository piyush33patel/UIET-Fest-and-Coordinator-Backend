<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$response = array();

    $sql = "SELECT DISTINCT student.rollno,name FROM student,participates,events WHERE student.rollno=participates.rollno AND participates.title=events.title AND events.type='TECHNICAL'";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result))
    {
        array_push($response, array("rollno"=>$row["rollno"], "name"=>$row["name"]));
    }
echo json_encode($response);
?>
