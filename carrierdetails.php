<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include "connection.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$degrees=mysqli_real_escape_string($conn,$_POST['degrees']);
$instutions=mysqli_real_escape_string($conn,$_POST['instutions']);
$marks=mysqli_real_escape_string($conn,$_POST['marks']);
$yearspanfrom=mysqli_real_escape_string($conn,$_POST['yearspanfrom']);
$yearspanto=mysqli_real_escape_string($conn,$_POST['yearspanto']);
$resume_id=mysqli_real_escape_string($conn,$_POST['resumeid']);
$userid=mysqli_real_escape_string($conn,$_POST['userid']);
//check data is already exists or not;
$query=$conn->query("select * from `resume_carrier_details` where `resume_id`='$resume_id' and `user_id`='$userid'");
if($query->num_rows>0)
{
    //update resume_top_details datas.
    $query1=$conn->query("update `resume_carrier_details` set 
    `degrees`='$degrees',`instutions`='$instutions',`marks`='$marks',`yearfrom`='$yearspanfrom',`yearto`='$yearspanto' where `resume_id`='$resume_id' and `user_id`='$userid'");
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
  $query1=$conn->query("insert into `resume_carrier_details`
  (`resume_id`,`user_id`,`degrees`,`instutions`,`marks`,`yearfrom`,`yearto`)values
  ('$resume_id','$userid','$degrees','$instutions','$marks','$yearspanfrom','$yearspanto')");
  if($query1)
  {
    $body="<h3>Welcome raju</h3>
    <p>
     Here is Your resumeLink <a href='http://localhost:4200/dynamic/$userid/$resume_id'>click here</a>
    </p>";
    $mail = new PHPMailer(true);
                              
$mail->isSMTP();                                         
$mail->Host       = 'smtp.gmail.com';  
$mail->SMTPAuth   = true;                           
$mail->Username   = 'rajssp904@gmail.com';
$mail->Password   = '31121997r#';          
$mail->SMTPSecure = 'tls';                                 
$mail->Port       = 587;                        
$mail->setFrom('rajssp904@gmail.com', 'Customresume');
$mail->addAddress('rajussp31121997@gmail.com','raju');    
$mail->isHTML(true);                                
$mail->Subject = 'Email Verification';
$mail->Body    = $body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if($mail->send())
{
$resp_array='You Will Recieve A Mail from us Shortly..';
}
  }
else
{
      $resp_array='Data insertion failed'.$conn->error;  
}
}
echo json_encode($resp_array);
?>