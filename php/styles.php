<meta charset="utf-8" />
<meta
  name="viewport"
  content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link
  rel="icon"
  type="image/x-icon"
  href="../svg/logo-resturant3.png"
  media="(prefers-color-scheme: light)" />
<link
  rel="icon"
  type="image/x-icon"
  href="../svg/logo-resturant4.png"
  media="(prefers-color-scheme: dark)" />
<link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css" />
<link rel="stylesheet" href="../css/owl.theme.default.min.css" />
<link rel="stylesheet" href="../css/bootstrap-datepicker.css" />
<link rel="stylesheet" href="../css/jquery.timepicker.css" />
<link rel="stylesheet" href="../css/owl.carousel.min.css" />
<link rel="stylesheet" href="../css/magnific-popup.css" />
<link rel="stylesheet" href="../css/ionicons.min.css" />
<link rel="stylesheet" href="../css/flaticon.css" />
<link rel="stylesheet" href="../css/animate.css" />
<link rel="stylesheet" href="../css/icomoon.css" />
<link rel="stylesheet" href="../css/aos.css" />
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/style2.css" />
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
  integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer" />

<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require '../vendor/autoload.php';

// send email
function sendMail(String $sender, String $name, String $subject, String $body)
{
  $mail = new PHPMailer(true);
  set_time_limit(300);

  try {
    //Server settings
    $mail->isSMTP();                                    // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                             // Enable SMTP authentication
    $mail->Username = 'gmail address';           // SMTP username
    $mail->Password = 'gmail adress app password';              // SMTP password (use an app password if 2FA is enabled)
    $mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                  // TCP port to connect to

    //Recipients
    $mail->setFrom('gmail address', 'Gallery Cafe');
    $mail->addAddress($sender, $name);     // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

// mas email
function maskEmail($email)
{
  list($username, $domain) = explode('@', $email);
  $maskedUsername = substr($username, 0, 3) . str_repeat('*', 4);
  $maskedEmail = $maskedUsername . '@' . $domain;
  return $maskedEmail;
}

// set page header
function top($nme, $hd)
{
  echo "<section class='hero-wrap hero-wrap-2' style='background-image: url(../images/customer.jpg)' data-stellar-background-ratio='0.5'>
        <div class='overlay'></div>
        <div class='container'>
          <div class='row no-gutters slider-text align-items-center justify-content-center'>
            <div class='col-md-9 ftco-animate text-center'>
              <h1 class='mb-2 bread'>$hd</h1>
              <p class='breadcrumbs'>
                <span class='mr-2'><a href='home.php'>Home <i class='ion-ios-arrow-forward'></i></a></span>
                <span>$nme <i class='ion-ios-arrow-forward'></i></span>
              </p>
            </div>
          </div>
        </div>
      </section>";
}

// admin interface page header
function topAdmin($nme, $hd)
{
  echo "<section class='hero-wrap hero-wrap-2' style='background-image: url(../images/admin.jpg)' data-stellar-background-ratio='0.5'>
        <div class='overlay'></div>
        <div class='container'>
          <div class='row no-gutters slider-text align-items-center justify-content-center'>
            <div class='col-md-9 ftco-animate text-center'>
              <h1 class='mb-2 bread'>$hd</h1>
              <p class='breadcrumbs'>
                <span class='mr-2'><a href='dashboard.php'>Dashboard <i class='ion-ios-arrow-forward'></i></a></span>
                <span>$nme <i class='ion-ios-arrow-forward'></i></span>
              </p>
            </div>
          </div>
        </div>
      </section>";
}

// staff unterfaces navigation bar
function navigationStaff(int $n)
{
  echo ($n == 1) ? "<li><a class='active' href='dashboard.php'>Dashboard</a></li>" : "<li><a href='dashboard.php'>Dashboard</a></li>";
  echo ($n == 2) ? "<li><a class='active' href='resavation.php'>Reservations</a></li>" : "<li><a href='resavation.php'>Reservations</a></li>";
  echo ($n == 3) ? "<li><a class='active' href='food.php'>Menu Items</a></li>" : "<li><a href='food.php'>Menu Items</a></li>";
  echo ($n == 4) ? "<li><a class='active' href='orders.php'>Orders</a></li>" : "<li><a href='orders.php'>Orders</a></li>";
  echo ($n == 5) ? "<li><a class='active' href='table.php'>Tables</a></li>" : "<li><a href='table.php'>Tables</a></li>";
}

// Customer interface navigation
function navigation(int $n)
{
  echo ($n == 1) ? "<li><a class='active' href='home.php'>Home</a></li>" : "<li><a href='home.php' >Home</a></li>";
  echo ($n == 2) ? "<li><a class='active' href='about.php'>About</a></li>" : "<li><a href='about.php'>About</a></li>";
  echo ($n == 3) ? "<li><a class='active' href='menu.php'>Specialties</a></li>" : "<li><a href='menu.php'>Specialties</a></li>";
  echo ($n == 4) ? "<li><a class='active' href='bLog.php'>BLog</a></li>" : "<li><a href='bLog.php'>BLog</a></li>";
  echo ($n == 5) ? "<li><a class='active' href='contact.php'>Contact</a></li>" : "<li><a href='contact.php'>Contact</a></li>";
}

// admin unterfaces navigation bar
function navigationAdmin(int $n)
{
  echo ($n == 1) ? "<li><a class='active' href='dashboard.php'>Dashboard</a></li>" : "<li><a href='dashboard.php'>Dashboard</a></li>";
  echo ($n == 2) ? "<li><a class='active' href='resavation.php'>Reservations</a></li>" : "<li><a href='resavation.php'>Reservations</a></li>";
  echo ($n == 3) ? "<li><a class='active' href='food.php'>Foods</a></li>" : "<li><a href='food.php'>Foods</a></li>";
  echo ($n == 4) ? "<li><a class='active' href='customer.php'>Customers</a></li>" : "<li><a href='customer.php'>Customers</a></li>";
  echo ($n == 5) ? "<li><a class='active' href='table.php'>Tables</a></li>" : "<li><a href='table.php'>Tables</a></li>";
  echo ($n == 6) ? "<li><a class='active' href='orders.php'>Orders</a></li>" : "<li><a href='orders.php'>Orders</a></li>";
}
