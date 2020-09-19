<?php
require "vendor_1/autoload.php";
include 'connection.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$size = sizeof($_POST)-(sizeof($_POST)/2);
for($i=0;$i<$size;$i++)
 {
     $resid=$_POST['resumeid'.$i];
     $rating=$_POST['starvalue'.$i];

    $query=$conn->query("update `resume_details` set `rating`='$rating' where `resume_id`='$resid'");
     if($query)
     {
         echo 'updated';
     }else
     {
         echo 'updation failed';
     }
 }
?>