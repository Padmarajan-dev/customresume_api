<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header("Access-Control-Allow-Headers: X-Requested-With");
$mailid=$_POST['mail'];
$subject=$_POST['sub'];
$message=$_POST['message'];
$headers="From:".$mailid;
$to='rajussp31121997@gmail.com';
$mail = new PHPMailer(true);
                                
$mail->isSMTP();                                         
$mail->Host       = 'smtp.gmail.com';  
$mail->SMTPAuth   = true;                           
$mail->Username   = 'rajssp904@gmail.com';
$mail->Password   = '31121997r#';          
$mail->SMTPSecure = 'tls';                                 
$mail->Port       = 587;                        
$mail->setFrom($mailid, 'User');
$mail->addAddress($to,'PadmaRajan');    
$mail->isHTML(true);                                
$mail->Subject = 'Email Verification';
$mail->Body    = $body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if($mail->send())
{
$resp_array='Your mail Sended Sucessfully';
}else
{
  $resp_array="mail did'nt send";   
}
echo $resp_array;
?>