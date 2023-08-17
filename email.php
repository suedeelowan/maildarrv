<?php

require_once("php-mailer/PHPMailer.php");
require_once("php-mailer/SMTP.php");
require_once("php-mailer/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

function send_mail_soumission($email,$ville)
{
  $mail = new PHPMailer();
  $date=date('d-m-Y');
  // $email='brouakanda@gmail.com';

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    // $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    // $mail->Username = 'udc.ci2022@gmail.com';
    $mail->Username = 'dfpi.mae.ci@gmail.com';
    // $mail->Username = 'ario2009@yahoo.fr';
    // $mail->Username = 'dqac.mfp.ci@gmail.com';
    
    // $mail->Password = 'ixlflicfdeodybmd';
    $mail->Password = 'dqmjwpdjeeonrqjn'; //@@gmail.com
    // $mail->Password = '76qkz55dxncpdzld';
    // $mail->Password = 'rpdvwohwosehbwkv';
    
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('dfpi@diplomatie.gouv.ci', 'Email pour le DFPI');
    $mail->addReplyTo($email);
    $mail->addAddress($email);
    $mail->addCC('a.akanda@diplomatie.gouv.ci');

    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    $mail->addBCC('marcelkongoza1@yahoo.fr');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
    $mail->addAttachment($ville, 'courrier_darrv.pdf');

    $mail->isHTML(true);
    $mail->Subject = "Test pour envoi email {$date}";
    $mail->Body = "<b>Ceci est un test pour le le projet DFPI<br>
                   <b>Ceci est un test<br><br>";

    $mail->send();

  } catch (Exception $e) {

  }
}


/*

function send_mail_soumission($email, $num_reclamation, $date_soumission)
{
  $mail = new PHPMailer();

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dqac.mfp.ci@gmail.com';
    $mail->Password = 'ixlflicfdeodybmd';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('dqac.mfp.ci@gmail.com', 'Direction de la Qualité et l Accompagnement du Changement');
    $mail->addReplyTo($email);
    $mail->addAddress($email);
    $mail->addCC('dqac.mfp.ci@gmail.com');

    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    $mail->isHTML(true);
    $mail->Subject = "Notification réclamation n° {$num_reclamation}";
    $mail->Body = "<b>Réclamation soumise avec succès<br>
                   <b>Code Réclamation: </b> {$num_reclamation} du {$date_soumission}<br><br>";

    $mail->send();

  } catch (Exception $e) {

  }
}

function send_mail_cruc_to_direction($nom_complet, $email, $email_direction, $num_reclamation, $date_transmission)
{
  $mail = new PHPMailer();

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dqac.mfp.ci@gmail.com';
    $mail->Password = 'ixlflicfdeodybmd';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('dqac.mfp.ci@gmail.com', 'Direction de la Qualité et l Accompagnement du Changement');
    $mail->addReplyTo($email);
    $mail->addAddress($email);
    $mail->addCC($email_direction);

    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    $mail->isHTML(true);
    $mail->Subject = "Notification réclamation n° {$num_reclamation} transmise par CRUC";
    $mail->Body = "<b>Nom Agent CRUC :</b> {$nom_complet}<br><br>
                   <b>Réclmation N° :</b> {$num_reclamation} du {$date_transmission}<br><br>";

    $mail->send();
  } catch (Exception $e) {

  }
}


function send_mail_direction_to_cruc($libelle_direction, $email, $email_direction, $num_reclamation, $date_transmission)
{
  $mail = new PHPMailer();

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dqac.mfp.ci@gmail.com';
    $mail->Password = 'ixlflicfdeodybmd';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom($email);
    $mail->addReplyTo('dqac.mfp.ci@gmail.com', 'Direction de la Qualité et l Accompagnement du Changement');
    $mail->addAddress('dqac.mfp.ci@gmail.com', 'Direction de la Qualité et l Accompagnement du Changement');
    $mail->addCC($email_direction);

    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    $mail->isHTML(true);
    $mail->Subject = "Notification réclamation n° {$num_reclamation} transmise par {$libelle_direction}";
    $mail->Body = "<b>Direction :</b> {$libelle_direction}<br><br>
                   <b>Réclmation N° :</b> {$num_reclamation} du {$date_transmission}<br><br>";

    $mail->send();
  } catch (Exception $e) {
  }
}

function send_mail_cruc_to_usc($email, $num_reclamation, $date_transmission, $observation_fin)
{
  $mail = new PHPMailer();

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dqac.mfp.ci@gmail.com';
    $mail->Password = 'ixlflicfdeodybmd';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('dqac.mfp.ci@gmail.com', 'Direction de la Qualité et l Accompagnement du Changement');
    $mail->addReplyTo($email);
    $mail->addAddress($email);
    $mail->addCC('dqac.mfp.ci@gmail.com');

    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    $mail->isHTML(true);
    $mail->Subject = "Notification réclamation n° {$num_reclamation} transmis par la CRUC";
    $mail->Body = "<b>Réclmation N° :</b> {$num_reclamation} du {$date_transmission}<br><br>
                  <b>Observation :</b> {$observation_fin}<br><br>";

    $mail->send();
  } catch (Exception $e) {
  }
}
*/