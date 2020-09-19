<?php 
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$userid=mysqli_real_escape_string($conn,$_POST['userid']);
$length=$_POST['length'];
for($i=0;$i<$length;$i++)
{
$resumeid=mysqli_real_escape_string($conn,$_POST['resumeid'.$i]);
$query=$conn->query("select * from `resume_top_details` where `resume_id`='$resumeid' and `user_id`='$userid'");
if($query->num_rows>0)
{
    $resp_array[]=true;
}else
{
    $resp_array[]=false;
}
}
echo json_encode($resp_array);
?>