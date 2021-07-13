<?php
require "vanjske_biblioteke/smarty-3.1.34/libs/Smarty.class.php";
require "vanjske_biblioteke/sesija.class.php";
require "vanjske_biblioteke/baza.class.php";
global $id_korisnik;
Sesija::kreirajSesiju();
if (isset($_SESSION["uloga"])) {
    $status = "Odjava" . " <i class='fa fa-sign-out'></i>";
    $korime = $_SESSION["korisnik"];
    $id_korisnik = $_SESSION["id_korisnik"];
} else {
    $status = "Prijava" . " <i class='fa fa-sign-in'></i>";
    $korime = "Profil";
}
$p = dirname($_SERVER["REQUEST_URI"]);
if (isset($_POST["odjavabtn"]) && isset($_SESSION["uloga"])) {
    dodaj_zapis($putanja = getcwd(), "Odjava", "", "");
    Sesija::obrisiSesiju();
    header("Location:$p/obrasci/prijava.php");
} else if (isset($_POST["odjavabtn"]) && !isset($_SESSION["uloga"])) {
    header("Location:$p/obrasci/prijava.php");
}

function dodaj_zapis($putanja, $tip, $upit, $ostala)
{
    $sada = date("d.m.Y H:i:s");
    $fp = fopen("$putanja/log/dnevnik.log", "a+");
    if (isset($_SESSION["uloga"])) {
        fwrite($fp, $_SESSION["korisnik"]);
    } else {
        fwrite($fp, "Neregistrirani");
    }
    fwrite($fp, "[]");
    fwrite($fp, $tip);
    fwrite($fp, "[]");
    fwrite($fp, $upit);
    fwrite($fp, "[]");
    fwrite($fp, $sada);
    fwrite($fp, "[]");
    fwrite($fp, $ostala);
    fwrite($fp, "\n");
    fclose($fp);
}

function IspisVirtualnogVremena($direktorij)
{
    $url = "$direktorij/json/konfiguracija.json";
    $fp = fopen($url, "r");
    $string = fread($fp, filesize($url));
    $json = json_decode($string, true);
    $sati = $json["konfiguracija"]["pomak"];
    fclose($fp);
    $vrijeme_servera = time();
    $virtualno_vrijeme = date("Y-m-d H:i:s", $vrijeme_servera + ($sati * 60 * 60));
    return $virtualno_vrijeme;
}
function IspisVirtualnogVremena2($direktorij)
{
    $url = "$direktorij/json/konfiguracija.json";
    $fp = fopen($url, "r");
    $string = fread($fp, filesize($url));
    $json = json_decode($string, true);
    $sati = $json["konfiguracija"]["pomak"];
    fclose($fp);
    $vrijeme_servera = time();
    $virtualno_vrijeme =  $vrijeme_servera + ($sati * 60 * 60);
    return $virtualno_vrijeme;
}
function vrati_zapis($naziv)
{
    $fp = fopen($naziv, 'r');
    $rezultat = fread($fp, filesize($naziv));
    fclose($fp);
    $polje = explode("\n", $rezultat);
    return $polje;
}
function ZapisiSesiju($putanja, $trajanje)
{
    $fp = fopen($putanja, "w");
    fwrite($fp, $trajanje);
    fclose($fp);
}
function UpravljajSesijom($putanja, $putanjavirtualno)
{
    $fp = fopen($putanja, 'r');
    $rezultat = fread($fp, filesize($putanja));
    fclose($fp);
    $datum = IspisVirtualnogVremena2($putanjavirtualno);
    $expireAfter = $rezultat;
    if (isset($_SESSION['last_action'])) {
        $secondsInactive = $datum - $_SESSION['last_action'];
        $expireAfterSeconds = $expireAfter * 60;

        if ($secondsInactive >= $expireAfterSeconds) {
            session_unset();
            session_destroy();
        }
    }
    $_SESSION['last_action'] = $datum;
}
