<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$socialmedias=mysqli_real_escape_string($conn,$_POST['socialmedia']);
$userid=mysqli_real_escape_string($conn,$_POST['userid']);
$resume_id=mysqli_real_escape_string($conn,$_POST['resumeid']);
//check data is already exists or not;
$query=$conn->query("select * from `resume_socialmedia_details` where `resume_id`='$resume_id' and `user_id`='$userid'");
if($query->num_rows>0)
{
    //update resume_top_details datas.
    $query1=$conn->query("update `resume_socialmedia_details` set `socialmedias`='$socialmedias' where `resume_id`='$resume_id' and `user_id`='$userid'");
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
  $query1=$conn->query("insert into `resume_socialmedia_details`(`resume_id`,`user_id`,`socialmedias`)values
  ('$resume_id','$userid','$socialmedias')");
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