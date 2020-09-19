<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$userid=mysqli_real_escape_string($conn,$_POST['userid']);
$resume_id=mysqli_real_escape_string($conn,$_POST['resumeid']);
$query=$conn->query("select * from `resume_socialmedia_details` where `resume_id`='$resume_id' and `user_id`='$userid'");
if($query->num_rows>0)
{
   $result=$query->fetch_assoc();
   $resp_array[]=$result;
}else
{
    $resp_array[]="any data doesn't exists";
}
echo json_encode($resp_array);
?>