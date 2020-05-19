  <?php

                            if(isset($_POST['submit'])){
                              $name=$_POST['name'];
                              $mailto=$_POST['email'];
                              $msg=$_POST['msg'];
                              $headers = "From: shoaib <shoaib4030891@gmail.com>";

                              if($mailto !=''){
                                 require 'PHPMailer-master/PHPMailerAutoload.php';
                                 $mail = new PHPMailer();
                                 $mail ->IsSmtp();
                                 $mail ->SMTPDebug = 0;
                                 $mail ->SMTPAuth = true;
                                 $mail ->SMTPSecure = 'ssl';
                                 $mail ->Host = "smtp.gmail.com";
                                 $mail ->Port = 587 // or 587
                                 $mail ->IsHTML(true);
                                 $mail ->Username = "ms7150291@gmail.com";
                                 $mail ->Password = "csuet123";
                                 $mail ->SetFrom("ms7150291@gmail.com");
                                 $mail ->Subject = 'ku6 b';
                                 $mail ->Body = 'sdfsahdfaosfdajsofd';
                                 $mail ->AddAddress($mailto);
                                 if(!$mail->Send())
                                 {
                                     echo "Mail Not Sent";
                                 }
                                 else
                                 {
                                     echo "Mail Sent";
                                 }
                              }else{
                                echo '<script>alert("some error")</script>';
                              }
                            }

                            ?>