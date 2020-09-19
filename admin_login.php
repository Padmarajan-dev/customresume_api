<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$userid=mysqli_real_escape_string($conn,$_POST['userid']);
$query=$conn->query("select * from user_details where `id`=$userid");
if($query->num_rows>0)
{
$result = $query->fetch_assoc();
if($result['username']=='raju' && $result['email']=='rajussp31121997@gmail.com')
{
  $resp_array=True;
}else 
{
  $resp_array=false;
}
}
echo json_encode($resp_array);
?>