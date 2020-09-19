<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$skills=mysqli_real_escape_string($conn,$_POST['skills']);
$levels=mysqli_real_escape_string($conn,$_POST['levels']);
$userid=mysqli_real_escape_string($conn,$_POST['userid']);
$resume_id=mysqli_real_escape_string($conn,$_POST['resumeid']);
//check data is already exists or not;
$query=$conn->query("select * from `resume_skills_details` where `resume_id`='$resume_id' and `user_id`='$userid'");
if($query->num_rows>0)
{
    //update resume_top_details datas.
    $query1=$conn->query("update `resume_skills_details` set `skills`='$skills',`skill_levels`='$levels' where `resume_id`='$resume_id' and `user_id`='$userid'");
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
  $query1=$conn->query("insert into `resume_skills_details`(`resume_id`,`user_id`,`skills`,`skill_levels`)values
  ('$resume_id','$userid','$skills','$levels')");
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