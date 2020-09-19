<?php 
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$resumeid=mysqli_real_escape_string($conn,$_POST['resumeid']);
$resumename=mysqli_real_escape_string($conn,$_POST['resumename']);
$screenshot=mysqli_real_escape_string($conn,$_POST['screenshoturl']);
$desc=mysqli_real_escape_string($conn,$_POST['desc']);
$publishedon=Date('d-M-Y');
$rating='0';
$query=$conn->query("insert into `resume_details`(`resume_id`,`resume_name`,`resume_image`,`resume_desc`,`published_on`,`rating`)values
('$resumeid','$resumename','$screenshot','$desc','$publishedon','$rating')");
if($query)
{
    $resp_array="details saved";
}else
{
    $resp_array="insertion failed";
}
echo json_encode($resp_array);
?>