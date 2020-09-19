<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$body="<h3>Welcome raju</h3>
      <p>Thank You for join with us</p>";
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
}else
{
    $resp_array='You Will not Recieve A Mail  from us Shortly..';   
}
echo $resp_array;
?>