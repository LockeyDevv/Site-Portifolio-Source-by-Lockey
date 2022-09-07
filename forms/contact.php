<?php

  // Onde está "lockeydev@gmail.com" troque pro email que irá receber os e-mails enviados.
  $receiving_email_address = 'lockeydev@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Não foi possivel carregar o php email.');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];


  $contact->add_message( $_POST['name'], 'Para');
  $contact->add_message( $_POST['email'], 'E-mail');
  $contact->add_message( $_POST['message'], 'Mensagem', 10);

  echo $contact->send();
?>
