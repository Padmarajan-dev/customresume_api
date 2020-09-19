<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_arr=[];
$query=$conn->query("SELECT MONTHNAME(logginedon) as mname,COUNT(id) as cid FROM user_details GROUP BY MONTHNAME(logginedon)");
if($query->num_rows>0)
{
$i = 0;
 while($data=$query->fetch_assoc())
 {
 $data['mname']=str_split(strtoupper($data['mname']),3);   
 $data['mname']=$data['mname'][0]; 
 $resp_arr[$i]=$data;
 $i++;
 }
}else 
{
 echo json_encode('not exists');
}
echo json_encode($resp_arr);
?>