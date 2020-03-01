<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$response = array();

    $sql = "SELECT COUNT(DISTINCT rollno) FROM participates";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $response["total_participated_all"] = $row["COUNT(DISTINCT rollno)"];
    
    $sql1 = "SELECT COUNT(DISTINCT rollno) FROM participates,events WHERE participates.title=events.title AND events.type='CULTURAL'";
    $result1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $response["total_participated_cultural"] = $row1["COUNT(DISTINCT rollno)"];
    
    $sql2 = "SELECT COUNT(DISTINCT rollno) FROM participates,events WHERE participates.title=events.title AND events.type='TECHNICAL'";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $response["total_participated_technical"] = $row2["COUNT(DISTINCT rollno)"];
    
    $sql3 = "SELECT COUNT(DISTINCT rollno) FROM participates,events WHERE participates.title=events.title AND events.type='SPORTS'";
    $result3 = mysqli_query($con, $sql3);
    $row3 = mysqli_fetch_array($result3);
    $response["total_participated_sports"] = $row3["COUNT(DISTINCT rollno)"];
    
echo json_encode($response);
?>
