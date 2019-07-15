<?php
  require "../vendor/phpmailer/phpmailer/PHPMailerAutoload.php";

  $mail = new PHPMailer;

  $mail->isSMTP();
  $mail->Host = 'localhost';
  $mail->Port = 465;

  $mail->SMTPDebug = 0;

  $mail->SMTPAuth = false;
  $mail->SMTPSecure = "ssl";
  //$mail->Username = "server@stevensandsonscaffolding.co.uk";
  //$mail->Password = "SSwebpage2017@";

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

/* DEV SETTINGS 

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;

$mail->SMTPDebug = 0;

$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Username = "zac@bnby.dev";
$mail->Password = "#iRemix2018";

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

/* ----------------- */


  date_default_timezone_set('Europe/London');
  $mail->setFrom("server@stevensandsonscaffolding.co.uk", "Stevens & Son Scaffolding"); // ??
  $mail->addAddress("stevensandson@btconnect.com");
  $mail->isHTML(true);

  $first_name = clean($_POST['first-name']);
  $last_name = clean($_POST['last-name']);
  $phone = clean($_POST['phone']);
  $email = clean($_POST['email']);
  $comments = clean($_POST['comments']);

  $date = date('d/m/Y G:i a');
  $mail->Subject = "{$first_name} {$last_name} - {$date}";
  //$mail->Subject = $first_name .' '. $last_name .' - Contact Form - '. )
  $mail->Body = "<b>First Name:</b> {$first_name}<br><b>Last Name:</b> {$last_name}<br><b>Phone:</b> {$phone}<br><b>Email:</b> {$email}<br><b>Comments:</b> {$comments}";
  $mail->AltBody = "<b>First Name:</b> {$first_name}<br><b>Last Name:</b> {$last_name}<br><b>Phone:</b> {$phone}<br><b>Email:</b> {$email}<br><b>Comments:</b> {$comments}";


  if(!$mail->send()) {
    echo 'Message could not be sent ' . die($mail->ErrorInfo);
  } else {
    echo "success";
  }


  function clean($string) {
    $string = trim($string);
    $string = strip_tags($string);
    $string = htmlspecialchars($string, ENT_QUOTES, "UTF-8");
    $string = str_replace("\n", "", $string);
    $string = trim($string);
    return $string;
  }



?>
