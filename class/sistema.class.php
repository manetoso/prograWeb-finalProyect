<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    include_once('bd.class.php');
    class Sistema extends Database{
        public function enviarCorreo($nom, $asunto, $cont, $direccion){
            require_once ($_SERVER['DOCUMENT_ROOT'].'/proyecto/vendor/autoload.php');
            $msg ='
            <html>
                <body>
                    <p>'.$cont.'</p>
                    <br/>
                    <p>Att: '.$nom.'</p>
                    <br/>
                    <p>Correo de Contacto: '.$direccion.'</p>
                </body>
            </html>';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->Username = '17030452@itcelaya.edu.mx';
            $mail->Password = 'Protocolo1-';
            $mail->setFrom('17030452@itcelaya.edu.mx', 'Servidor de BFAgro');
            $mail->addAddress('manetoso98@hotmail.com', 'Empleado de BFAAgro');
            $mail->Subject = $asunto;
            $mail->msgHTML($msg);
      
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message sent!';
            }
        }
    }
    $nuevoSis = new Sistema;
?>