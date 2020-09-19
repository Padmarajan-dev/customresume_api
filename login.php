<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$user=mysqli_real_escape_string($conn,$_POST['user']);
$email=mysqli_real_escape_string($conn,$_POST['mail']);
$query=$conn->query("select * from `user_details` where `username`='$user' and `email`='$email'");
if($query->num_rows>0)
{
   $result=$query->fetch_assoc();
   $resp_array[0]=$result['id'];
   $resp_array[1]="Successfully Loggined";
}else
{
    $resp_array[1]="Login Falied";
}
echo json_encode($resp_array);
?>