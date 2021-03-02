<?php
date_default_timezone_set('GMT');
function send_ver_mail($email,$username,$userid,$app_name,$key,$token){
 
                            
                               
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    return $mail_send=0;
                                } else {
                                  
                                    include "classes/class.phpmailer.php"; // include the class name
                                    $mail = new PHPMailer(); // create a new object
                                    $mail->IsSMTP(); // enable SMTP
                                    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                                    $mail->SMTPAuth = true; // authentication enabled
                                    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                                    $mail->Host = "smtp.mail.yahoo.com";
                                    $mail->Port = 465; // or 587
                                    $mail->IsHTML(true);
                                    $mail->Username = "purvish.j@yahoo.com";
                                    $mail->Password = "pj@1234";
                                    $mail->SetFrom("purvish.j@yahoo.com");
                                    $mail->Subject = "API Credentials";
                                    $mail->Body = "Dear $username,<br>Below is the Credentials for the APP <strong>$app_name</strong>.<br><strong>Key:</strong> $key<br><strong>Token:</strong> $token<br><hr>Please dont share this detail with anyone.";
                                    ;
                                    $mail->AddAddress($email);
                                    if (!$mail->Send()) {
                                        return $mail_send=0;
                                        
                                    } else {
                                       return $mail_send=1;
                                 
                                    }
                                }
                            


}


?>