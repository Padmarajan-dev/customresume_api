<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_arr=[];
$query=$conn->query("SELECT resume_name FROM resume_details");
if($query->num_rows>0)
{
    while($row = $query->fetch_assoc())
    {
      array_push($resp_arr,$row['resume_name']);
    }
}
echo json_encode($resp_arr);
?>