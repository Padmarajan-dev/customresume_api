<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$post_details=[];
$urllength=(int)$_POST['urllength'];
$images='';
//datas from user;
for($i=0;$i<$urllength;$i++)
{
    if($i<$urllength-1)
    {
    $images=$images.$_POST['sharables'.$i].',';
    }else
    {
    $images=$images.$_POST['sharables'.$i];  
    }
}

$urls=mysqli_real_escape_string($conn,$_POST['urls']);
$titles=mysqli_real_escape_string($conn,$_POST['titles']);
$userid=mysqli_real_escape_string($conn,$_POST['userid']);
$resume_id=mysqli_real_escape_string($conn,$_POST['resumeid']);
$descs=mysqli_real_escape_string($conn,$_POST['descs']);
//check data is already exists or not;
$query=$conn->query("select * from `resume_portfolio_details` where `resume_id`='$resume_id' and `user_id`='$userid'");
if($query->num_rows>0)
{
    //update resume_top_details datas.
    $query1=$conn->query("update `resume_portfolio_details` set `images`='$images',`titles`='$titles',`urls`='$urls',`descs`='$descs' where `resume_id`='$resume_id' and `user_id`='$userid'");
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
  $query1=$conn->query("insert into `resume_portfolio_details`(`resume_id`,`user_id`,`images`,`urls`,`titles`,`descs`)values
  ('$resume_id','$userid','$images','$urls','$titles','$descs')");
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