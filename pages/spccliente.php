<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = null;

//((isset($_POST['enviar'])) && (isset($_POST['nome'])) && (isset($_POST['assunto']))
//&& (isset($_POST['email'])) && (isset($_POST['mensagem'])) && (isset($_POST['flexRadioDefault'])) && (isset($_POST['cliente'])))

if ((isset($_POST['enviar'])) && (isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['mensagem']) && !empty(trim($_POST['mensagem'])))
    && (isset($_POST['assunto']) && !empty(trim($_POST['assunto']))) && (isset($_POST['nome']) && !empty(trim($_POST['nome'])))
    && (isset($_POST['cliente']) && !empty(trim($_POST['cliente']))) && (isset($_POST['flexRadioDefault']))
) {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];
        $indicacao = $_POST['indicacao'];

        if (isset($_POST['enviar'])) {
            if (($_POST['flexRadioDefault'] == "Facebook")) {
                $indicacao = 'Facebook';
            } elseif ($_POST['flexRadioDefault'] == "Instagram") {
                $indicacao = 'Instagram';
            } else {
                $indicacao = $_POST['indicacao'];
            }
        }

        $a = $_POST['cliente'];
        if (($_POST['cliente'] == "cliente")) {
            $a = 'Cliente';
        } elseif ($_POST['cliente'] == "revendedor") {
            $a = 'Revendedor';
        }


        //Server settings
        $mail->SMTPDebug = false;    //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.facilitacertificado.com.br';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'contato@facilitacertificado.com.br';                     //SMTP username
        $mail->Password   = 'HO1hz7Y8r';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('contato@facilitacertificado.com.br', 'Tnet Sistemas'); // de qual email esta enviando, usar o mesmo que o Username
        $mail->addAddress('jezerprocha@gmail.com', 'Tnet Sistemas');    //Add a recipient
        $mail->addReplyTo($email, $nome);
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        $corpo_mensagem = " 
        <br><strong>Formulário via Email Tnet Sistemas(SPC TNET SISTEMAS)</strong>
        <br>--------------------------------------------<br>
        <br><strong>Formulário de:</strong> $a
        <br><strong>Assunto:</strong> $assunto
        <br><strong>Nome:</strong> $nome
        <br><strong>Email:</strong>$email
        <br><strong>Mensagem:</strong>$mensagem
        <br><strong>Como você chegou aqui?</strong>
        <br><strong>Indicação:</strong> $indicacao
        <br><br>--------------------------------------------
        ";

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $assunto; //assunto , titutlo.
        $mail->Body    = $corpo_mensagem;
        $mail->AltBody = $corpo_mensagem; // quando o aparelho do cliente não é compativel com html ( somente text)

        $mail->send();
        echo '<br><br><br><br><br><br><br><br><br><br>
        <div class="container">
        <h1 class="display-4 text-success d-flex p-2 bd-highlight">Enviada com Sucesso</h1>
        <a href="' . INCLUDE_PATH . 'spc-tnet-sistemas" class="btn bg-primary btn-lg mt-5 text-white">Voltar</a>
        </div>';
    } catch (Exception $e) {
        // verifica se a variável $mail é um objeto antes de tentar acessar a propriedade ErrorInfo
        if (is_object($mail)) {
            echo '<br><br><br><br><br><br><br><br><br><br>
            <div class="container">
            <h1 class="display-4 text-danger d-flex p-2 bd-highlight">A mensagem não pôde ser enviada: ' . $mail->ErrorInfo . '</h1>
            <a href="' . INCLUDE_PATH . 'spc-tnet-sistemas" class="btn bg-primary btn-lg mt-5 text-white">Voltar</a>
            </div>';
        } else {
            echo '<br><br><br><br><br><br><br><br><br><br>
            <div class="container">
            <h1 class="display-4 text-danger d-flex p-2 bd-highlight">A mensagem não pôde ser enviada</h1>
            <a href="' . INCLUDE_PATH . 'spc-tnet-sistemas" class="btn bg-primary btn-lg mt-5 text-white">Voltar</a>
            </div>';
        }
    }
} else {
    // verifica se a variável $mail é um objeto antes de tentar acessar a propriedade ErrorInfo
    if (is_object($mail)) {
        echo '<br><br><br><br><br><br><br><br><br><br>
    <div class="container">
    <h1 class="display-4 text-danger d-flex p-2 bd-highlight">A mensagem não pôde ser enviada: ' . $mail->ErrorInfo . '</h1>
    <a href="' . INCLUDE_PATH . 'spc-tnet-sistemas" class="btn bg-primary btn-lg mt-5 text-white">Voltar</a>
    </div>';
    } else {
        echo '<br><br><br><br><br><br><br><br><br><br>
    <div class="container">
    <h1 class="display-4 text-danger d-flex p-2 bd-highlight">A mensagem não pôde ser enviada</h1>
    <a href="' . INCLUDE_PATH . 'spc-tnet-sistemas" class="btn bg-primary btn-lg mt-5 text-white">Voltar</a>
    </div>';
    }
}
