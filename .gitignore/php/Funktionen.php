<?php


class Funktionen
{
    public static function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1; //Merken uns die Länge des Zeichenvorrats
        for ($i = 0; $i < 8; $i++) {
            //Random Zeichen aus Zeichenvorrat picken
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        //Array umwandeln in einen string
        return implode($pass);
    }
}


?>