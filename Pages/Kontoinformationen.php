<?php
session_start();
//echo $_SESSION['kundenId'];
require_once("../DB/DB.php");
DB::$dbName="portfolio";
DB::$user="root";
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <link href="../css/mainStyles.css" rel="stylesheet" type="text/css"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Hind|Muli:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta type="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body style="padding-top: 15px;">
    <!-- Nur zur Überprüfung, ob Session Handling funktioniert
                <h2><?php //echo $_SESSION["kundenID"]; ?></h2> -->
        <div class="container">
            <!-- In dieser Form wird jede Zelle dynamisch mit PHP gefüllt -->
            <form id="kontoInfo" action="../php/KontoAenderungenSpeichern.php" method="post">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="kontoInfoVorname">Vorname</label>
                        <input id="kontoInfoVorname" name="infoVorname" type="text" class="form-control" placeholder="Vorname" value="<?php
                        $res = DB::queryFirstRow("SELECT vorname FROM Benutzer WHERE kundenId = %i", $_SESSION["kundenID"]);
                        echo htmlspecialchars($res["vorname"]);
                        DB::disconnect();
                        ?>">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="kontoInfoNachname">Nachname</label>
                        <input id= "kontoInfoNachname" name="infoNachname" type="text" class="form-control" placeholder="Nachname" value="<?php
                        $res = DB::queryFirstRow("SELECT nachname FROM Benutzer WHERE kundenId = %i", $_SESSION["kundenID"]);
                        echo htmlspecialchars($res["nachname"]);
                        ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="kontoInfoBenutzername">Benutzername </label>
                    <input id= "kontoInfoBenutzername" name="infoBenutzername" type="text" class="form-control" placeholder="Benutzername" value="<?php
                    $res = DB::queryFirstRow("SELECT benutzername FROM Benutzer WHERE kundenId = %i", $_SESSION["kundenID"]);
                    echo htmlspecialchars($res["benutzername"]);
                    ?>">
                </div>
                <div class="form-group">
                    <label for="kontoInfoMail">E-Mail Adresse </label>
                    <input id= "kontoInfoMail" name="infoMail" type="text" class="form-control" placeholder="E-Mail Adresse" value="<?php
                    $res = DB::queryFirstRow("SELECT emailadresse FROM Benutzer WHERE kundenId = %i", $_SESSION["kundenID"]);
                    echo htmlspecialchars($res["emailadresse"]);
                    ?>">
                </div>
                <div class="form-group">
                    <label for="kontoInfoIBAN">IBAN </label>
                    <input id= "kontoInfoIBAN" name="infoIBAN" type="text" class="form-control" placeholder="IBAN" value="<?php
                    $res = DB::queryFirstRow("SELECT iban FROM Benutzer WHERE kundenId = %i", $_SESSION["kundenID"]);
                    echo htmlspecialchars($res["iban"]);
                    ?>">
                </div>
                <div class="form-group">
                    <label for="kontoInfoPasswort">Passwort </label>
                    <input id= "kontoInfoPasswort" name="infoPasswort" type="password" class="form-control" placeholder="Passwort" value="<?php
                    $res = DB::queryFirstRow("SELECT passwort FROM Benutzer WHERE kundenId = %i", $_SESSION["kundenID"]);
                    echo htmlspecialchars($res["passwort"]);
                    ?>">
                </div>
                <div class="form-group">
                    <label for="kontoInfoPasswortWdh">Passwort wiederholen</label>
                    <input id= "kontoInfoPasswortWdh" name="infoPasswortWdh" type="password" class="form-control" placeholder="Passwort" value="">
                </div>
                <input class="btn btn-primary" type="submit" value="Einstellungen speichern">
            </form>
        </div>
    </body>
</html>
