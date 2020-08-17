<?php

//PHPMailer https://github.com/PHPMailer/PHPMailer
require("Mail/src/PHPMailer.php");
require("Mail/src/SMTP.php");
require("Mail/src/Exception.php");

include '../DB/DB.php';
include "../php/Funktionen.php";

DB::$user= "root";
DB::$dbName = "portfolio";
$usermail = $_POST['UserMail'];

$newPW = Funktionen::randomPassword();

$sql = "SELECT * FROM benutzer WHERE emailadresse = '$usermail'";
$result = DB::queryFirstRow($sql);
$userName = $result["nachname"];
$user = $result["benutzername"];

// Wir müssen sichergehen, dass auch ein valider User hinter dieser Mail liegt
if (isset($result)){
    //var_dump($result);

    //Aufbau vgl. Doku von PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 1;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'xxxxxxxxx';                  // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'xxxxxxxxx';      // SMTP username
        $mail->Password   = 'xxxxxxxxx';                      // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 000;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('xxxxxxxxx', 'xxxxxxxxx');
        $mail->addAddress($result['emailadresse'], $result['benutzername']);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Ihr neues Passwort (Benutzer: $user)";
        $mail->Body    = "Sehr geehrte/-r Frau/Herr $userName,<br>Ihr neues Passwort lautet: $newPW </br>Ändern Sie so schnell wie möglich Ihr Passwort.<br><br>Mit freundlichen Grüßen<br>Würth Kundenbestellportal Kundenservice";

        // Update des Users mit dem neuen PW
        DB::update('benutzer', array('passwort' => $newPW), "kundenID=%s", $result['kundenID']);
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "";
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
echo $usermail;

DB::disconnect();
//Umleitung auf Startseite
header("Location: ../Welcome.php");
?>
