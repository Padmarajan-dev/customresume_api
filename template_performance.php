<?php
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_arr=[];
$query=$conn->query("SELECT resume_id FROM resume_details");
if($query->num_rows>0)
{
    while($row=$query->fetch_assoc())
    {
        $query1=$conn->query("SELECT COUNT(id) as used_id FROM resume_top_details where resume_id='".$row['resume_id']."'");
        if($query1->num_rows>0)
        {
            while($ro=$query1->fetch_assoc())
            {
                array_push($resp_arr,$ro['used_id']);
            }
        }
    }
}
echo json_encode($resp_arr);
?>