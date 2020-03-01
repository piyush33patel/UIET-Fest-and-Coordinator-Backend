<?php
require_once dirname(__FILE__).'/Constants.php';
$con  =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM `events` WHERE `type` LIKE 'TECHNICAL'";
$result = mysqli_query($con,$sql);
$response = array();
while($row = mysqli_fetch_array($result))
{
array_push($response,array(
                "title"=>$row["title"],
                "type"=>$row["type"],
                "about"=>$row["about"],
                "date"=>$row["date"],
                "venue"=>$row["venue"],
                "begin"=>$row["begin"],
                "finish"=>$row["finish"]));
}
echo json_encode($response);
?>
