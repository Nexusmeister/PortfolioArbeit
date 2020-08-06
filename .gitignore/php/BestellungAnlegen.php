<?php
session_start();
include "../DB/DB.php";

//Hole alle Daten aus der Form
$kundenID = $_SESSION["kundenID"];
$artikelNr = $_POST["artikelBez"];
//$bestellmenge = $_POST["bestellmenge"];
$vpeAnzahl = $_POST["vpe"];
$datum = $_POST["datum"];

DB::$user="root";
DB::$dbName="portfolio";

$echo = DB::insert("bestellungen", array("kundenID" => $kundenID, "artikelID" => $artikelNr, "vpeAnzahl" => $vpeAnzahl, "laufzeit" => $datum));

if($echo) {
    echo "<script>alert('Die gewünschte Bestellung wurde angelegt!');</script>";
}
else {
    echo "<script>alert('Die gewünschte Bestellung konnte leider nicht angelegt werden!');</script>";
}
//Wir lenken nach dem insert wieder auf die Bestellungsanlage, damit User erneut etwas eingeben kann
header("Refresh:0; url=../Pages/Bestellungsanlage");
