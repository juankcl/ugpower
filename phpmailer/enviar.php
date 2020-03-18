<?php
$result = "";
if(isset($POST['submit'])){
    required 'phpmailer/PHPMailerAutoload.php';
    required 'phpmailer/class.smtp.php';
    required 'phpmailer/class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username = 'solido.en.radianes@gmail.com';
    $mail->Password = 'correodeprueba';

    $mail->setFrom($_POST['correo'],$_POST['nombre']);
    $mail->addAddress('solido.en.radianes@gmail.com');
    $mail->addReplyTo($_POST['correo'],$_POST['nombre']);

    $mail->isHTML(true);
    $mail->Subject='Enviado por '.$_POST['nombre'];
    $mail->Body='<h1 align=center>Nombre:  '.$_POST['nombre'].'<br>Email: '.$_POST['correo'].'<br>Mensaje: '.$_POST['mensaje'].'</h1>';

    if(!mail->send()){
        $result="Algo salió mal, intentalo de nuevo";
    }
    else{
        $result="Gracias".$_POST['nombre']." por contactarnos, espera nuestra respuesta pronto!";
    }

}
?>