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

  <section class="container">

    <h3 class="text-center">Contact us</h3>

    <form class="form" id="contact" action="inc/contact/insert.php" method="post">
      <input class="form-input" type="text" placeholder="Your name" id="contact_name" name="contact_name" required>
      <input class="form-input" type="email" placeholder="Your email" id="contact_email" name="contact_email" required>
      <textarea class="form-input" placeholder="Your message" id="contact_message" name="contact_message" rows="5" required></textarea>
      <div class="form-input-group">
        <label for="check"><input id="check" name="check" type="checkbox" required>I agree to the processing of personal data.</label>
      </div>

      <input class="btn" type="submit" value="Submit" name="contact_us">
    </form>
    <div id="error" class="text-red">
  </section>
</main>

<?php

include('partials/footer.php');

?>