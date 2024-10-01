<br>
<section id="footer">
  <div class="footer-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h3>Seja nosso Revendedor!</h3>
          <form action="/homeenv" method="post">
            <div class="row">
              <div class="col mb-3">
                <!-- <label class="text-parceiro">Seu nome:</label><br> -->
                <input class="parceiro-input" type="text" name="nome" placeholder="Seu nome" required>
              </div>
              <div class="col">
                <!-- <label class="text-parceiro">Seu número:</label><br> -->
                <input class="parceiro-input" type="tel" name="numero" placeholder="Seu número" required>
              </div>
            </div>
            <!-- <label class="text-parceiro">Seu e-mail:</label><br> -->
            <input type="email" name="email" placeholder="Seu e-mail" required><br>
            <br>
            <div class="g-recaptcha" data-sitekey="6Le_l5QgAAAAABnEfnYXpn5ulKZnzM2LZWk5U9_6"></div>
            <input style="color: #000" name="enviar" type="submit" value="Enviar">
          </form>
        </div>
        <div class="col-lg-6 parceiro">

        </div>
      </div>

    </div>
  </div>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</section>