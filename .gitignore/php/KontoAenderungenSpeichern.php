<?php
include "../DB/DB.php";
DB::$user="root";
DB::$dbName="portfolio";
session_start();

// Wir holen uns die Userinformationen zur Überprüfung
$result = DB::queryFirstRow("SELECT * FROM Benutzer WHERE KundenId = %i", $_SESSION["kundenID"]);

//Speichere alle Werte in Variablen zwischen
$vorname = trim($_POST["infoVorname"]);
$nachname = trim($_POST["infoNachname"]);
$benutzername = trim($_POST["infoBenutzername"]);
$iban = trim($_POST["infoIBAN"]);
$mail = trim($_POST["infoMail"]);

//echo $vorname;
//echo $nachname;
//echo $benutzername;
//echo $mail;

if ($_POST["infoVorname"] != $result["vorname"]){
    DB::update("Benutzer", array('vorname' => $vorname), "kundenId = %i", $_SESSION["kundenID"]);
}
if ($_POST["infoNachname"] != $result["nachname"]){
    DB::update("Benutzer", array('nachname' => $nachname), "kundenId = %i", $_SESSION["kundenID"]);
}

// Wir müssen überprüfen, ob der Username bereits genutzt wird!
$usernamen = DB::queryOneColumn("benutzername", "SELECT benutzername FROM Benutzer");
$usernameBereitsVergeben = false;
foreach ($usernamen as $username){
    if ($username == $_POST["infoBenutzername"]){
        $usernameBereitsVergeben = true;
    }
}

if (($_POST["infoBenutzername"] != $result["benutzername"]) && !$usernameBereitsVergeben){
    DB::update("Benutzer", array('benutzername' => $benutzername), "kundenId = %i", $_SESSION["kundenID"]);
}

if ($_POST["infoIBAN"] != $result["iban"]){
    DB::update("Benutzer", array('iban' => $iban), "kundenId = %i", $_SESSION["kundenID"]);
}
if ($_POST["infoMail"] != $result["emailadresse"]){
    DB::update("Benutzer", array('emailadresse' => $mail), "kundenId = %i", $_SESSION["kundenID"]);
}

//Passwortlogik -> Die PW Eingabe muss identisch sein, aber auch verschieden zum alten PW sein
if (($_POST["infoPasswort"] == $_POST["infoPasswortWdh"]) && ($_POST["infoPasswort"] != $result["passwort"])){
    DB::update("Benutzer", array('passwort' => $_POST["infoPasswort"]), "kundenId = %i", $_SESSION["kundenID"]);
}

header("Location: ../Pages/Kontoinformationen.php");
?>