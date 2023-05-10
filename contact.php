<?php

include('partials/header.php');

?>

<main>
  <section class="container">
    <h2>Contacts</h2>

    <div class="contacts">Mobil: <a href="tel:+421950392495"> +421950392495 </a></div>
    <div class="contacts">
      Email: <a href="mailto:gleb.okhrimenko@student.ukf.sk" target="_blank">gleb.okhrimenko@student.ukf.sk</a>
    </div>

    <!-- Google Map Nitra -->
    <!-- Kreativny -->
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d84911.9739044157!2d18.01826633785493!3d48.31248273840395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476b3ee0556593fd%3A0x400f7d1c6978bf0!2sNitra!5e0!3m2!1sen!2ssk!4v1669726297715!5m2!1sen!2ssk" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

  <section class="container mt-3 pb-3">
    <h3 class="text-center">Contact us</h3>
    <!-- Form -->
    <!-- <form id="form" method="post" action="inc/contact/insert.php">
      <div class="form-input">
        <label for="name" class="label">Meno</label>
        <input type="text" name="name" id="name" placeholder="Meno" class="input" />
        <small class="form-error-feedback"></small>
      </div>
      <div class="form-input">
        <label for="email" class="label">E-mail</label>
        <input type="text" name="email" id="email" placeholder="E-mail" class="input" />
        <small class="form-error-feedback"></small>
      </div>
      <div class="form-input">
        <label for="text" class="label">Sprava</label>
        <textarea name="text" id="text" placeholder="Vaša sprava" rows="5" class="input textarea"></textarea>
        <small class="form-error-feedback"></small>
      </div>
      <div class="form-input checkbox-input">
        <input type="checkbox" id="check" class="checkbox" />
        <label for="check" class="label">Súhlasím so spracovaním osobných údajov</label>
        <small class="form-error-feedback"></small>
      </div>
      <button type="submit" id="form-btn">Submit</button>
    </form> -->
    <form id="contact" action="inc/contact/insert.php" method="post">
      <input type="text" placeholder="Vaše meno" id="contact_name" name="contact_name" required><br>
      <input type="email" placeholder="Váš email" id="contact_email" name="contact_email" required><br>
      <textarea placeholder="Vaša správa" id="contact_message" name="contact_message"></textarea><br>
      <input type="checkbox" required><label for=""> Súhlasím so spracovaním osobných údajov.</label><br>
      <input type="submit" value="Odoslať" name="contact_us">
    </form>
    <div id="error" class="text-red">
  </section>
</main>

<?php

include('partials/footer.php');

?>