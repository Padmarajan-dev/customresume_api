<?php 
require "vendor_1/autoload.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$mongoClient=new mongoClient();
$db=$mongoClient->myresume;
$collection=$db->starrating;
$user_id=$_POST['userid'];
$resume_id=$_POST['resumeid'];
$stars=(int)$_POST['stars'];
$document=$collection->insert(['userid'=>$user_id,'resumeid'=>$resume_id,'stars'=>$stars]);
if($document)
{
    $resp_array="inserted";
}else
{
    $resp_array="insertion failed";
}
echo json_encode($resp_array);
?>