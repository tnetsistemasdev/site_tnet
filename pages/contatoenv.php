<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if ((isset($_POST['enviar']))) {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = false; //SMTP::DEBUG_SERVER;                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tnettecnologia@gmail.com';                     //SMTP username
        $mail->Password   = 'yfwhvycnsugbkxpn';   //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 465;

        //informações do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];

        //Recipients
        $mail->CharSet = 'UTF-8'; //manter formatação de acentos
        $mail->setFrom('contato@tnetsistemas.com.br', 'TNET Sistemas'); // de qual email esta enviando, usar o mesmo que o Username

        $mail->addAddress('contato@tnetsistemas.com.br', 'TNET Sistemas');     //Adicionar um destinatário
        $mail->addReplyTo($email, $nome);
        // $mail->addCC('cc@example.com');   //copiar parar outros email vejam 
        // $mail->addBCC('bcc@example.com'); //copiar oculta parar outros email 

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Adicionar Anexos
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //O nome é opcional

        $corpo_mensagem = " 
    <br><strong> Contato TNET </strong>
    <br>--------------------------------------------<br>
    <br><strong>Assunto:</strong> $assunto
    <br><strong>Nome:</strong> $nome
    <br><strong>Email:</strong>$email
    <br><strong>Mensagem:</strong>$mensagem
    <br><br>--------------------------------------------
    ";


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $assunto; //assunto , titutlo.
        $mail->Body    = $corpo_mensagem;
        $mail->AltBody = $corpo_mensagem; // quando o aparelho do cliente não é compativel com html ( somente text)
        $mail->send();

        echo '<div style="heigth: 500px;" class="container mt-5 mb-5">
        <br>
        <br>
        <br>
        <br>
        <br>
        
        <h1 class="btn btn-success">Mensagem enviada</h1>
         <br>
         <a class="btn btn-danger" href="/">Voltar</a>
         </div>';
    } catch (Exception $e) {
        echo "A mensagem não pôde ser enviada: {$mail->ErrorInfo}";
    }
} else {
    echo 'Erro ao enviar e-mail, acesso não foi via formulário.';
}
