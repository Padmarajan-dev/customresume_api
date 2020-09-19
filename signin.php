<?php
include "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
$resp_array=[];
$username=mysqli_real_escape_string($conn,$_POST['username']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
$query=$conn->query("select * from `user_details` where `email`='$email'");
if($query->num_rows>0)
{
    $resp_array='Email-id already Exists please try Different one';
}else
{
    $date = date('d-m-y');
    $query1=$conn->query("insert into `user_details`(`username`,`email`,`mobile`,`logginedon`)values
  ('$username','$email','$mobile','$date')");
  if($query1)
  {
      $resp_array='SignIn Successfully';
      $body="<h3>Welcome ".$username."</h3>".
      "<p>Thank You for join with us<a href='http://localhost:4200/users'>click here to continue</a>
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
  $mail->addAddress($email,$username);    
  $mail->isHTML(true);                                
  $mail->Subject = 'Email Verification';
  $mail->Body    = $body;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  if($mail->send())
  {
  $resp_array='You Will Recieve A Mail from us Shortly..';
  }else
  {
    $resp_array='You Will not Recieve A Mail from us Shortly..';   
  }
  }else
  {
      $resp_array=('SignIn failed'.$conn->error);  
  }
}
echo json_encode($resp_array);
?>
