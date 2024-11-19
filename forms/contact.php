<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  
  $receiving_email_address = 'prueba593215@gmail.com';

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  // Configura los detalles del correo
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];
  $contact->message = $_POST['message'];

  // Agregar archivo adjunto si se ha cargado
  if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] == 0) {
    // Llamar a la función add_attachment
    $contact->add_attachment('pdfFile');
  }

  // Configura el servidor SMTP
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'prueba593215@gmail.com',
    'password' => 'qslp aomp rlhn zvgl',
    'port' => '587'
  );

  // Agregar mensajes al correo
  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  // Enviar el mensaje
  echo $contact->send();
?>
