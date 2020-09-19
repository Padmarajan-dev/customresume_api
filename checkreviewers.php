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
$document=$collection->find(['userid'=>$user_id,'resumeid'=>$resume_id]);
foreach($document as $obj)
{
    if($obj['userid']==$user_id && $obj['resumeid']==$resume_id)
    {
        $resp_array="Exists";
    }else
    {
        $resp_array="not exists";
    }
}
echo json_encode($resp_array);
?>