<?php
//Wir müssen sicher sein, dass der User eingeloggt ist
session_start();
//echo $_SESSION['kundenId'];
if (!isset($_SESSION["kundenID"])) {
    header("Location: Welcome.php");
}
//console.log($_SESSION["kundenID"]);
require_once("DB/DB.php");
DB::$dbName = "portfolio";
DB::$user = "root";
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <!-- Skripte -->
    <script>
        function Logout() {

        }
    </script>
    <meta charset="utf-8">
    <link rel="shortcut icon"
          href="https://eshop.wuerth.de/is-bin/intershop.static/WFS/1401-B1-Site/-/de_DE/webkit/media/system/layout/images/favicon.ico"
          title="Adolf Würth GmbH &amp; Co. KG icon" type="image/x-icon">
    <link href="css/mainStyles.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Hind|Muli:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta type="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundenportal</title>
</head>
<body>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a id="logo" href=https://www.wuerth-industrie.com/web/de/wuerthindustrie/wuerthindustrie_cteilepartner.php"
           target="_blank">
            <img src="Images/logo_ergaenzt.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#home">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#products">Services</a>
                <a class="nav-item nav-link" href="#modalKonto" data-toggle="modal" data-target="#modalKonto">Kontoinformationen</a>
                <a class="nav-item nav-link" href="php/Logout.php">Logout</a>
                <a class="nav-item nav-link" href="#indexFooter">About</a>
            </div>
        </div>
    </nav>
</header>

<section id="home" class="text-center">
    <h1 class="sectionheader">Würth Kundenbestellportal</h1>
    <hr/>
    <h2>Bestellungen &amp; Kundenübersicht in einem Portal</h2>
    <table>
        <tr>
            <td>
                <a href="#products">
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

<section id="products" class="hintergrundGrau text-center">
    <h2 class="sectionheader">Produkte & Dienstleistungen</h2>
    <h3>Diese Funktionen stehen Ihnen zur Verfügung</h3>
    <div class="container-fluid align-items-center">
        <ul>
            <div class="row align-items-center list-inline justify-content-center">
                <li>
                    <!-- Behälterverwaltung-->
                    <button id="btnMaterialuebersicht" type="button" class="btn" data-toggle="modal"
                            data-target="#modalMaterial">
                        <img class="crop" src="Images/Material.png"/>
                    </button>
                    <div id="modalMaterial" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                         aria-labelledby="modalMaterial" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Materialübersicht</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding-top: 0px">
                                    <iframe class="modalFrame" src="Pages/Materialübersicht.php" width="100%"
                                            height="100%"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- Bestellverlauf -->
                    <button id="btnBestellverwaltung" type="button" class="btn" data-toggle="modal"
                            data-target="#modalBestellungen">
                        <img src="Images/Bestellungsübersicht.png"/>
                    </button>
                    <div id="modalBestellungen" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                         aria-labelledby="modalBestellungen" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Bestellungsübersicht</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding-top: 0px">
                                    <iframe class="modalFrame" src="Pages/Bestellverwaltung.php" width="100%"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- Kontodaten verwalten -->
                    <button id="btnKonto" type="button" class="btn" data-toggle="modal" data-target="#modalKonto">
                        <img src="Images/Kontoinfos.png"/>
                    </button>
                    <div id="modalKonto" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                         aria-labelledby="modalKonto" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Kontoinformationen</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <iframe class="modalFrame" src="Pages/Kontoinformationen.php" width="100%"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- Bestellung hinzufügen -->
                    <button id="btnAddBestellung" type="button" class="btn" data-toggle="modal" data-target="#modalAddBestellung">
                        <img src="Images/shopping-cart-add-button_icon-icons.com_56132.png">
                    </button>
                    <div id="modalAddBestellung" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                         aria-labelledby="modalKonto" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Bestellung hinzufügen</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding-top: 0px">
                                    <iframe class="modalFrame" src="Pages/Bestellungsanlage.php" width="100%"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- Bestellungen ändern -->
                    <button id="btnEditBestellung" type="button" class="btn" data-toggle="modal" data-target="#modalEditBestellung">
                        <img src="Images/edit_modify_icon-icons.com_49882.png">
                    </button>
                    <div id="modalEditBestellung" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                         aria-labelledby="modalKonto" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Bestellung ändern</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding-top: 0px">
                                    <iframe class="modalFrame" src="Pages/Bestellungsaenderung.php" width="100%"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- Bestellungen löschen -->
                    <button id="btnStornoBestellung" type="button" class="btn" data-toggle="modal" data-target="#modalStornoBestellung">
                        <img src="Images/seo-social-web-network-internet_262_icon-icons.com_61518.png">
                    </button>
                    <div id="modalStornoBestellung" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                         aria-labelledby="modalKonto" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Bestellung löschen</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" style="padding-top: 0px">
                                    <iframe class="smallModalFrame" src="Pages/Bestellungsstorno.php" width="100%"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- Logout -->
                    <button id="btnLogout" type="button" class="btn" data-toggle="modal">
                        <a href="php/Logout.php">
                            <img src="Images\logout_pic.png" id="imgLogout"/>
                        </a>
                    </button>
                </li>
            </div>
        </ul>
    </div>
</section>
<!-- Site footer -->
<footer id="indexFooter" class="site-footer">
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
                    <li><a class="text-justify"
                           href="https://play.google.com/store/apps/details?id=com.sic.android.wuerth.wuerthapp">Google
                            Android</a></li>
                    <li><a class="text-justify" href="https://apps.apple.com/de/app/wurth/id391713517">Apple iOS</a>
                    </li>
                    <li><a class="text-justify" href="https://www.microsoft.com/en-us/p/wurth/9wzdncrcwspb">Windows
                            Phone</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li>
                        <a href="https://www.wuerth-industrie.com/web/de/wuerthindustrie/ueberuns/profil_cteilepartner.php">About
                            Us</a></li>
                    <li>
                        <a href="https://www.wuerth-industrie.com/web/de/wuerthindustrie/ueberuns/kontakt_ansprechpartner/ihre_ansprechpartner/ansprechpartner.php">Contact
                            Us</a></li>
                    <li><a href="https://www.wuerth-industrie.com/web/de/wuerthindustrie/datenschutz.php">Privacy
                            Policy</a></li>
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
                    <li><a class="facebook" href="https://de-de.facebook.com/Wuerth.Industrie.Service.Jobworld" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>
                    <li><a class="instagram" href="https://www.instagram.com/wuerth_industrie_service/?hl=de" target="_blank"><i
                                    class="fa fa-instagram"></i></a></li>
                    <li><a class="youtube" href="https://www.youtube.com/user/WuerthIndustrie" target="_blank"><i
                                    class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
