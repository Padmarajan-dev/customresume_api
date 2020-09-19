<?php 
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$query=$conn->query("select * from `resume_details`");
if($query->num_rows>0)
{
    while($result=$query->fetch_assoc())
    {
        $resp_array[]=$result;
    }
  echo json_encode($resp_array);
}
?>