<?php
include '../DB/DB.php';
session_start();

DB::$user="root";
DB::$dbName="portfolio";
if (!isset($_POST['vorname']) && !isset($_POST['nachname']) && !isset($_POST['benutzer']) && !isset($_POST['mail']) && !isset($_POST['password']) && !isset($_POST['iban'])){
    header("Location: ../Welcome.php");
    exit("Registrierung fehlgeschlagen");
}else{
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $benutzer = $_POST['benutzer'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $iban = $_POST['iban'];

    DB::insert("benutzer", array("vorname" => $vorname,
        "nachname" => $nachname,
        "benutzername" => $benutzer,
        "emailadresse" => $mail,
        "passwort" => $password,
        "iban" => $iban));

    header("Location: ../Welcome.php");
}
?>