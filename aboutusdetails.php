<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
//datas from user;
$objective=mysqli_real_escape_string($conn,$_POST['objective']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$userid=mysqli_real_escape_string($conn,$_POST['userid']);
$resume_id=mysqli_real_escape_string($conn,$_POST['resumeid']);
$age=mysqli_real_escape_string($conn,$_POST['age']);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
//check data is already exists or not;
$query=$conn->query("select * from `resume_aboutus_details` where `resume_id`='$resume_id' and `user_id`='$userid'");
if($query->num_rows>0)
{
    //update resume_top_details datas.
    $query1=$conn->query("update `resume_aboutus_details` set `objective`='$objective',`address`='$address',`age`='$age',`mobile`='$mobile',`email`='$email' where `resume_id`='$resume_id' and `user_id`='$userid'");
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
  $query1=$conn->query("insert into `resume_aboutus_details`(`resume_id`,`user_id`,`objective`,`address`,`age`,`mobile`,`email`)values
  ('$resume_id','$userid','$objective','$address','$age','$mobile','$email')");
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