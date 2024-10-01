<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$enviado = false;

if (
    isset($_POST['enviar']) &&
    isset($_POST['nome']) && !empty(trim($_POST['nome'])) &&
    isset($_POST['email']) && !empty(trim($_POST['email'])) &&
    isset($_POST['numero']) && !empty(trim($_POST['numero']))

) {

    // Verificar o reCAPTCHA
    if (!empty($_POST['g-recaptcha-response'])) {
        $recaptchaResponse = $_POST['g-recaptcha-response'];
        $secretKey = '6Le_l5QgAAAAAI2c-vvb8ZMA5anq4iwFM68ARa9_';
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $recaptchaResponse
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $recaptchaResult = json_decode($response);

        if (!$recaptchaResult->success) {
            // O reCAPTCHA falhou, exiba uma mensagem de erro e não envie o email
            echo "
  <div class=\"container\">
    <section class=\"m-5\">
      <h1 class=\"display-4 text-danger d-flex p-2 bd-highlight\">ReCAPTCHA inválido</h1>
      <a class=\"btn btn-danger\" href=\"" . INCLUDE_PATH . "contato\">Voltar</a>
    </section>
  </div>
";
            exit;
        }
    } else {
        // O reCAPTCHA não foi submetido, exiba uma mensagem de erro
        echo "
    <div class=\"container\">
      <section class=\"m-5\">
        <h1 class=\"display-4 text-danger d-flex p-2 bd-highlight\">Por favor, preencha o reCAPTCHA</h1>
        <a class=\"btn btn-danger\" href=\"" . INCLUDE_PATH . "contato\">Voltar</a>
      </section>
    </div>
  ";
        exit;
    }

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug =  false; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.tnetsistemas.com.br';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'contato@tnetsistemas.com.br';                     //SMTP username
        $mail->Password   = 'K6mUA77VZgf4Gk';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        // $mail->SMTPOptions = array( // add parar erro de certificado SSL do servidor SMTP
        //     'ssl' => array(
        //         'verify_peer' => false,
        //         'verify_peer_name' => false,
        //         'allow_self_signed' => true
        //     )
        // );

        // Informações do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
        $assunto = "Seja parceiro";
        $replyto = $email;

        // Recipients
        $mail->setFrom('contato@tnetsistemas.com.br', 'Tnet Sistemas'); // De qual email esta enviando, usar o mesmo que o Username

        $mail->addAddress('contato@tnetsistemas.com.br', 'Tnet Sistemas');     // Adicionar um destinatário
        $mail->addReplyTo($replyto, $nome);

        $corpo_mensagem = "
        <br><strong>Formulário via site Tnet Sistemas (Quero ser revendedor)</strong>
        <br>--------------------------------------------<br>
        <br><strong>Assunto:</strong> $assunto
        <br><strong>Nome:</strong> $nome
        <br><strong>Numero:</strong> $numero
        <br><strong>E-mail:</strong> $email
        <br><br>--------------------------------------------";

        // Content
        $mail->isHTML(true); // Define o formato do e-mail como HTML
        $mail->CharSet = 'UTF-8'; // Define o conjunto de caracteres como UTF-8
        $mail->Subject = $assunto;
        $mail->Body    = $corpo_mensagem;
        $mail->AltBody = $corpo_mensagem; // Quando o aparelho do cliente não é compatível com HTML (somente texto)

        $mail->send();
        echo '
        <div class="container mt-5 mb-5">
            <div class="mt-5 mb-5">
                <div class="alert alert-success mt-5">
                    Mensagem enviada
                </div>
            </div>
            <a class="btn btn-primary" href="index.php">Voltar</a>
        </div>';
    } catch (Exception $e) {
        echo "A mensagem não pôde ser enviada: {$mail->ErrorInfo}";
    }
} else {
    echo 'Erro ao enviar e-mail, acesso não foi via formulário.';
}
