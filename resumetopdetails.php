<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
//datas from user;
$username=mysqli_real_escape_string($conn,$_POST['username']);
$works=mysqli_real_escape_string($conn,$_POST['works']);
$userid=mysqli_real_escape_string($conn,$_POST['userid']);
$resume_id=mysqli_real_escape_string($conn,$_POST['resumeid']);
$userprofile=mysqli_real_escape_string($conn,$_POST['profile']);
//check data is already exists or not;
$query=$conn->query("select * from `resume_top_details` where `resume_id`='$resume_id' and `user_id`='$userid'");
if($query->num_rows>0)
{
    //update resume_top_details datas.
    $query1=$conn->query("update `resume_top_details` set `username`='$username',`works`='$works',`user_profile`='$userprofile' where `resume_id`='$resume_id' and `user_id`='$userid'");
    if($query1)
    {
        $resp_array='Data Updated Successfully';
    }else
    {
        $resp_array=('Data Updation failed'.$conn->error);  
    }
}else
{
    //insert resume_top_details datas.
  $query1=$conn->query("insert into `resume_top_details`(`resume_id`,`user_id`,`username`,`works`,`user_profile`)values
  ('$resume_id','$userid','$username','$works','$userprofile')");
  if($query1)
  {
      $resp_array='Data Inserted Successfully';
  }else
  {
      $resp_array=('Data insertion failed'.$conn->error);  
  }
}
echo json_encode($resp_array);
?>