<?php
error_reporting(E_ALL);

require './vendor/autoload.php';
use Mailgun\Mailgun;

$name = $_POST['name'];
$email = $_POST['email'];
$type = $_POST['contact-type'];
$msg = $_POST['comments'];


/* Desarrollo */
$api_key = 'key-eb656047b090ea091ef7c5d2fbd83dc5';
// $send_to = '';
$send_to = 'dan@lovanworldwide.com';

$mgClient = new Mailgun($api_key);
$domain = "sandbox3bfa1334fbee4dcca5b08a9b34b46337.mailgun.org";

    $result = $mgClient->sendMessage($domain, array(
        'from' => 'LOVAN WORLDWIDE - Notifications <postmaster@'. $domain .'>',
        'to' => $send_to,
        'subject' => 'New Contact',
        'text' =>

        'Hello team.

        ' . $name . ' has send a new messagge

        Name: ' . $name . '
        Email: ' . $email. '
        Message:
        '. $msg .'',
        'html' =>
        '<html>Hello team. <br>

        <ul>
        <li>Name: ' . $name . '</li>
        <li>Email: ' . $email. '</li>
        <li>Message: <p>'. $msg .'</p> </li>
        </ul>
        <hr>
        </html>'
    ));

echo '<script>alert("Thanks for your mail.We will notify you shortly")</script>';

?>
