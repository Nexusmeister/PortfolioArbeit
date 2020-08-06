<?php
session_start();
if (isset($_SESSION["kundenID"]))
    header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="https://eshop.wuerth.de/is-bin/intershop.static/WFS/1401-B1-Site/-/de_DE/webkit/media/system/layout/images/favicon.ico" title="Adolf Würth GmbH &amp; Co. KG icon" type="image/x-icon">
    <title>Willkommen!</title>
    <link href="css/mainStyles.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Hind|Muli:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta type="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <!--Navbar-->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <a id="logo" href=https://www.wuerth-industrie.com/web/de/wuerthindustrie/wuerthindustrie_cteilepartner.php" target="_blank">
                <img src="Images/logo_ergaenzt.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#home">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#login">Login</a>
                    <a class="nav-item nav-link" href="#register">Registrieren</a>
                    <a class="nav-item nav-link" href="#aboutUs">Über uns</a>
                    <a class="nav-item nav-link" href="#shopsInProximity">Anfahrt</a>
                </div>
            </div>
        </nav>
    </header>
    <section id="home" class="text-center container">
        <h1 class="sectionheader">Würth Kundenbestellportal</h1>
        <hr />
        <h2>Bestellungen &amp; Kundenübersicht in einem Portal</h2>
        <table>
            <tr>
                <td>
                    <a href="#shopsInProximity">
                        <img id="pfeil" src="Images/pfeil_unten.png" alt="Pfeil" height="34" width="34">
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="Images/WIS_Luftbild.jpg" alt="Luftbild Würth Industrie Service" height="600" width="800"/>
                </td>
            </tr>
        </table>
    </section>

    <section class="" id="login">
        <div class="container">
            <h2 class="text-center sectionheader">Kundenlogin</h2>
            <hr/>
            <form id="login_form" action="php/Login.php" method="post">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <!--<label for="loginBenutzer">Benutzer</label>-->
                        <input id="loginBenutzer" class="form-control" type="text" name="benutzer" value="" placeholder="Benutzername">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <!--<label for="loginPasswort">Passwort</label>-->
                        <input id="loginPasswort" class="form-control" type="password" name="password" value="" placeholder="Passwort">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class = "col-md-4">
                        <input class="btn btn-danger" type="submit" name="loginsenden" value="Login" /><a id="pwVergessen" href="Pages/ForgotPassword.html">Passwort vergessen?</a>
                    </div>
                </div>
                <br>
                <div class="text-center"><a class="justify-content-center" href="Welcome.php#register">Noch kein Kunde? Registrieren Sie sich jetzt!</a></div>
            </form>
        </div>
    </section>

    <section id="register">
        <h2 class="sectionheader text-center">Kundenregistrierung</h2>
        <hr/>
        <div class="container text-center align-items-center center-block">
            <form id="register_form" action="php/Register.php" method="post">
                <div class="form-group">
                    <div class="form-row justify-content-center">
                        <div class="col-sm-3 my-1">
                            <label class="sr-only" for="vorname">Vorname</label>
                            <input class="form-control" type="text" name="vorname" id="vorname" value="" placeholder="Vorname" required>
                        </div>
                        <div class="col-sm-3 my-1 justify-content-center">
                            <label class="sr-only" for="nachname">Nachname</label>
                            <input class="form-control" type="text" name="nachname" id="nachname" value="" placeholder="Nachname" required>
                        </div>
                    </div>
                    <div class="form-row justify-content-center ">
                        <div class="col-sm-6 my-1">
                            <label class="sr-only" for="benutzer">Benutzername</label>
                            <div class="input-group">
                                <div class="input-group-prepend justify-content-center ">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="benutzer" placeholder="Benutzername" name="benutzer" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="col-sm-6 my-1">
                            <label class="sr-only" for="mail">E-Mail Adresse</label>
                            <input class="form-control" id="mail" type="email" name="mail" value="" placeholder="E-Mail Adresse" required>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="col-sm-6 my-1">
                            <label class="sr-only" for="mail">Passwort</label>
                            <input id="password" class="form-control" type="password" name="password" value="" placeholder="Passwort" required>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <br>
                        Zahlungsinformationen
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="col-sm-6 my-1">
                            <label class="sr-only" for="iban">IBAN</label>
                            <input id="iban" class="form-control" type="text" name="iban" value="" placeholder="IBAN" required>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <input id="RegistrierungAbsenden" class="btn btn-primary" type="submit" name="RegistrierungAbsenden" value="Registrieren"/>
                    </div>
                </div>
            </form>
        </div>

    </section>

    <section id="aboutUs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="sectionheader text-center" id="headline_wuerth_industrie_service_-_profil_eines_familienunternehmens">Würth Industrie Service - Profil eines Familienunternehmens</h1>
                    <p class="text-justify font-weight-bolder">Die Würth Industrie Service GmbH &amp; Co. KG wurde am 13. Januar 1999 durch die Ausgliederung der Division Industrie aus der Adolf Würth GmbH &amp; Co. KG in Künzelsau gegründet. Sie ist als eigenständiges Tochterunternehmen innerhalb der Würth-Gruppe mit über 1.640 Mitarbeitern am Standort Bad Mergentheim auf dem Drillberg tätig. Das ehemalige Gelände der Deutschordenskaserne bietet dabei ausreichend Raum für weitere Expansion. </p>
                    <img src="https://www.wuerth-industrie.com/web/media/pictures/wuerthindustrie/unternehmen/Drillberg_res_wl2_slider_1920_flex.png" alt="Firmengelände WIS" align="center" width="100%">
                    <br><br>
                    <h2 class="text-center">Kundenindividuelle C-Teile-Lösungen</h2>
                    <p class="text-justify">Unter der Marke „CPS<sup>®</sup> – C-Produkt-Service“ bietet die Würth Industrie Service den produzierenden Industriekunden individuell zugeschnittene, logistische Beschaffungs- und Versorgungskonzepte wie scannerunterstützte Regalsysteme, automatisierte elektronische Bestellsysteme oder eine Just-in-time-Versorgung mittels Kanban-Behältersystemen. Dabei erfolgt die Belieferung der Kunden direkt an die Fertigungslinie in die Produktion. Seit Kurzem ergänzen Kanban-Systeme mit patentierter Behälter- und RFID-Technologie die innovativen Logistiklösungen.</p>
                    <h2 class="text-center">C-Teile ohne Grenzen: Mehr als 1.100.000 Artikel</h2>
                    <p class="text-justify">Ein spezialisiertes Sortiment aus mehr als 1.100.000 Artikeln bildet die Basis für die professionelle industrielle C-Teile-Abwicklung: Neben DIN- und Normteilen sowie Verbindungs- und Befestigungselementen umfasst das Produktspektrum auch auf die Kundenanforderungen zugeschnittene Sonder- und Zeichnungsteile sowie Hilfs- und Betriebsstoffe und vieles mehr. </p>
                    <p><i><a href="https://www.wuerth-industrie.com/web/de/wuerthindustrie/ueberuns/profil_cteilepartner.php">Quelle:</a> Würth Industrie Service</i></p>
                </div>
            </div>

        </div>

    </section>
    <!--Vlt. noch so ne Map einbauen, wo man die nächsten Würth Shops findet? -->
    <section id="shopsInProximity">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Wie Sie zu uns finden</h2>
                    <hr>
                    <iframe class="col-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8408.516590513273!2d9.743474489637366!3d49.48895686516606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479871786cb89a85%3A0xc967388c3deb04a5!2sW%C3%BCrth%20Industrie%20Service%20GmbH%20%26%20Co.%20KG!5e0!3m2!1sde!2sde!4v1571569191798!5m2!1sde!2sde"
                            width="600" height="800" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Site footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">Diese Webseite wurde im Rahmen einer Portfolioaufgabe erstellt.
                        <br>Die Autoren sind:<br>
                        Robin Kaltenbach & Julian Geißendörfer
                    </p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Würth-App</h6>
                    <ul class="footer-links">
                        <li><a class="text-justify" href="https://play.google.com/store/apps/details?id=com.sic.android.wuerth.wuerthapp">Google Android</a></li>
                        <li><a class="text-justify" href="https://apps.apple.com/de/app/wurth/id391713517">Apple iOS</a></li>
                        <li><a class="text-justify" href="https://www.microsoft.com/en-us/p/wurth/9wzdncrcwspb">Windows Phone</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="https://www.wuerth-industrie.com/web/de/wuerthindustrie/ueberuns/profil_cteilepartner.php">About Us</a></li>
                        <li><a href="https://www.wuerth-industrie.com/web/de/wuerthindustrie/ueberuns/kontakt_ansprechpartner/ihre_ansprechpartner/ansprechpartner.php">Contact Us</a></li>
                        <li><a href="https://www.wuerth-industrie.com/web/de/wuerthindustrie/datenschutz.php">Privacy Policy</a></li>
                        <li><a href="https://www.wuerth-industrie.com/web/de/wuerthindustrie/agb.php">AGB</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2019 Würth Industrie Service GmbH & Co. KG
                    </p>
                </div>

                <div class="col-md-3 col-sm-5 col-xs-11">
                    <ul class="social-icons">
                        <li><a class="facebook" href="https://de-de.facebook.com/Wuerth.Industrie.Service.Jobworld"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="instagram" href="https://www.instagram.com/wuerth_industrie_service/?hl=de"><i class="fa fa-instagram"></i></a></li>
                        <li><a class="youtube" href="https://www.youtube.com/user/WuerthIndustrie"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>