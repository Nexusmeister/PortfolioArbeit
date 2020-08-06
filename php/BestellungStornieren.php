<?php

session_start();

$kundenId = $_SESSION["kundenID"];
$bestellNr = $_POST["bestellNr"];

include "../DB/DB.php";

DB::$dbName="portfolio";
DB::$user="root";
$sql = "SELECT * FROM bestellungen where kundenID = $kundenId AND bestellnummer = $bestellNr";
//echo $sql;
$result = DB::query($sql);
//echo $kundenId;

//Wir müssen sicherstellen, dass die BestellNr überhaupt vorhanden ist
if (!isset($result[0])){
    echo "<script>alert('Diese Bestellnummer ist uns nicht bekannt!');</script>";
}else{
    //Der User darf auch nur seine Bestellungen löschen
    $datensatz = $result[0];
    //echo $datensatz["bestellmenge"];
    $resKunde = $datensatz["kundenID"];
    if ($resKunde != $kundenId){
        echo "<script>alert('Die Bestellung ist nicht Ihrer KundenNr. zugewiesen!');</script>";
    }else{
        DB::startTransaction();
        DB::delete("bestellungen",  "bestellnummer = %s", $datensatz["bestellnummer"]);
        DB::commit();
        echo "<script>alert('Die gewünschte Bestellung wurde storniert!');</script>";
        
    }
}

//Wir reloaden die Page, damit der Alert noch angezeigt wird, danach Umleitung auf UI
header("Refresh:0; url=../Pages/Bestellungsstorno");
//header("Location: ../Pages/Bestellungsstorno");

//var_dump($result);
