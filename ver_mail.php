<?php
date_default_timezone_set('GMT');
function send_ver_mail($email,$username,$userid){
 
                            
                               
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
                                    $mail->Subject = "Forgot Password";
                                    $mail->Body = "Dear $username,<br>Here is the link for resetting password.<br>http://www.calienteitech.in/api/reset.php?id=$userid";
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