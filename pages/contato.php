 <!-- ======= Contato Section ======= -->
 <section id="contact" class="contact about">
     <div class="container" data-aos="fade-up">

         <div class="section-title">
             <h2>Contato</h2>
         </div>

         <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

             <div class="col-lg-5">
                 <div class="info">
                     <div class="address">
                         <i class="bi bi-geo-alt"></i>
                         <h4>Localização:</h4>
                         <p>Av. Jerônimo Monteiro, 1000 - Centro, Vitória - ES, 29010-935</p>
                     </div>

                     <div class="email">
                         <i class="bi bi-envelope"></i>
                         <h4>E-mail:</h4>
                         <p>contato@tnetsistemas.com.br</p>
                     </div>

                     <div class="phone">
                         <i class="bi bi-phone"></i>
                         <h4>Telefone:</h4>
                         <p>(65) 4042-1503</p>
                     </div>

                 </div>

             </div>

             <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

                 <form action="/contatoenv" method="post" onsubmit="return validarPost()" role="form" class="php-email-form">
                     <div class="row">
                         <div class="col-md-6 form-group">
                             <input type="text" name="nome" class="form-control" id="name" placeholder="Seu nome" required>
                         </div>
                         <div class="col-md-6 form-group mt-3 mt-md-0">
                             <input type="email" class="form-control" name="email" id="email" placeholder="Seu e-mail" required>
                         </div>
                     </div>
                     <div class="form-group mt-3">
                         <input type="text" class="form-control" name="assunto" id="subject" placeholder="Assunto" required>
                     </div>
                     <div class="form-group mt-3">
                         <textarea class="form-control" name="mensagem" rows="5" placeholder="Mensagem" required></textarea>
                     </div>
                     <div class="my-3">
                         <div class="loading">Carregando...</div>
                         <div class="error-message"></div>
                         <div class="sent-message">Sucesso!</div>

                     </div>
                     <div class="text-center">
                         <div name="g-recaptcha-response" class="g-recaptcha" data-sitekey="6Le_l5QgAAAAABnEfnYXpn5ulKZnzM2LZWk5U9_6"></div>
                         <button class="mt-4" name="enviar" type="submit">Enviar</button>
                     </div>

                 </form>

                 <?php

                    if ($_POST) {

                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => [
                                'secret' => '6Lel5QgAAAAAI2c-vvb8ZMA5anq4iwFM68ARa9_',
                                'response' => $_POST['g-recaptcha-response'] ?? ''
                            ]
                        ]);

                        //executa a requisição
                        $response = curl_exec($curl);

                        curl_close($curl);

                        $responseArray = json_decode($response, true);

                        $sucesso = $responseArray['sucess'] ?? false;

                        echo $sucesso ? "Ok " : "ReCAPTCHA inválido";
                        exit;
                    }

                    ?>

             </div>

         </div>

     </div>
 </section><!-- End Contact Section -->
 <!-- Google Tag Manager (noscript) -->
 <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W2RHGFQH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
 <!-- End Google Tag Manager (noscript) -->