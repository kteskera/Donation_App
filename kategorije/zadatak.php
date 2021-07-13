<?php
require "../zaglavlje.php";
global $stanje;
global $greske;
$style = array();
global $opiszadatka;
global $datumpocetka;
global $poruka;
global  $selekcija;
$zastavica = false;
if (isset($_GET['id'])) {
    $var = $_GET['id'];
    $veza = new Baza();
    $veza->spojiDB();
    $upit = "SELECT *,korisnik.id_korisnik,korisnik.ime,korisnik.prezime from zadatak left join korisnik on zadatak.id_korisnik=korisnik.id_korisnik where id_zadatak={$var}";
    $rezultat = $veza->selectDB($upit);
    $veza->zatvoriDB();

    while ($red = mysqli_fetch_array($rezultat)) {
        if ($red) {
            $opiszadatka = $red['opis'];
            $datumpocetka =  Konverzija($red['datum_pocetka']);
            $stanje = "Ažuriraj";
            $selekcija = "<option value='{$red['id_korisnik']}' selected>{$red['ime']} {$red['prezime']}</option>";
        }
    }
    if (isset($_POST['submit'])) {
        foreach ($_POST as $k => $v) {
            if ($k === "opiszadatka" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[0] = 'style="border:1px solid red"';
            }
            if ($k === "datumpocetka" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[1] = 'style="border:1px solid red"';
            }
        }
        if (!isset($_POST['selekcijakorisnika'])) {
            $greske .= "Polje: Zaduženi za zadatak ne smije ostati prazno!" . "<br>";
        }
        if (empty($greske)) {
            $veza = new Baza();
            $veza->spojiDB();
            $upit = "UPDATE `zadatak` SET `opis`='{$_POST['opiszadatka']}',`datum_pocetka`='{$_POST['datumpocetka']}' WHERE id_zadatak={$var}";
            $rezultat = $veza->selectDB($upit);
            var_dump($rezultat);
            $veza->zatvoriDB();
            $poruka = "Uspješno ažuriranje!";
            dodaj_zapis($putanja = dirname(getcwd()), "Rad s bazom", $upit, "");
            header("Location: zadaci.php");
        }
    }
}
if (!isset($_GET['id']) && isset($_GET['selekcijakategorije']) && isset($_GET['selekcijaprojekta2'])) {
    $zastavica = true;
    $id_projekt = $_GET['selekcijaprojekta2'];
    $stanje = "Kreiraj";
    if (isset($_POST['submit'])) {
        foreach ($_POST as $k => $v) {
            if ($k === "opiszadatka" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[0] = 'style="border:1px solid red"';
            }
            if ($k === "datumpocetka" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[1] = 'style="border:1px solid red"';
            }
        }
        if (!isset($_POST['selekcijakorisnika'])) {
            $greske .= "Polje: Zaduženi za zadatak ne smije ostati prazno!" . "<br>";
        }
        if (empty($greske)) {
            $id_projekt = $_GET['selekcijaprojekta2'];
            $opis = $_POST['opiszadatka'];
            $id_korisnik = $_POST['selekcijakorisnika'];
            var_dump($id_korisnik);
            $datum_pocetka = $_POST['datumpocetka'];
            $veza = new Baza();
            $veza->spojiDB();
            $query = "INSERT INTO `zadatak`( `id_projekt`, `id_korisnik`, `opis`, `datum_pocetka`) VALUES ('{$id_projekt}','{$id_korisnik}','{$opis}','{$datum_pocetka}')";
            $rezultat = $veza->selectDB($query);
            $veza->zatvoriDB();
            header("Location: zadaci.php");
            dodaj_zapis($putanja = dirname(getcwd()), "Rad s bazom", $query, "");
        }
    }
}
UpravljajSesijom("../log/trajanjesesije.conf",$putanja = dirname(getcwd()));
if (isset($_SESSION['id_korisnik']) && $_SESSION['uloga'] <= '2') {
$smarty = new Smarty();
$smarty->setTemplateDir("../templates")
    ->setCompileDir("../templates_c")
    ->setConfigDir("../configs")
    ->setCacheDir("../cache");
$putanja = dirname($_SERVER["REQUEST_URI"], 2);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Zadatak");
$smarty->assign("description", "Zadatak");
$smarty->assign("keywords", "Zadatak");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik", $id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("stanje", $stanje);
$smarty->assign("greske", $greske);
$smarty->assign("poruka", $poruka);
$smarty->assign("style", $style);
$smarty->assign("opiszadatka", $opiszadatka);
$smarty->assign("datumpocetka", $datumpocetka);
$smarty->assign("zastavica", $zastavica);
$smarty->assign("selekcija", $selekcija);
$smarty->display("zadatak.tpl");
$smarty->assign("validacija", "zadaci.php");
$smarty->display("podnozje.tpl");
}
else{
    header("Location:../index.php");
}
function Konverzija($mysql_date_string)
{
    $HTML_DATETIME_LOCAL = 'Y-m-d\TH:i';
    $php_timestamp = strtotime($mysql_date_string);
    $html_datetime_string = date($HTML_DATETIME_LOCAL, $php_timestamp);
    return $html_datetime_string;
}
function kreirajpadajucikorisnici()
{
    $upit = "SELECT DISTINCT korisnik.id_korisnik, korisnik.ime, korisnik.prezime,zahtjev_za_sudjelovanje.potvrda 
    from korisnik,zahtjev_za_sudjelovanje where korisnik.uloga_id_uloga='3' AND korisnik.id_korisnik=zahtjev_za_sudjelovanje.id_korisnik
    AND zahtjev_za_sudjelovanje.potvrda='1' AND zahtjev_za_sudjelovanje.id_projekt='{$_GET['selekcijaprojekta2']}'";
    $veza = new Baza();
    $veza->spojiDB();
    $rezultat = $veza->selectDB($upit);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($rezultat)) {
        if ($red) {
            echo "<option value='{$red['id_korisnik']}'>{$red['ime']} {$red['prezime']}</option>";
        }
    }
}
function kreirajpadajucikorisnici2()
{
    $upit = "SELECT DISTINCT korisnik.id_korisnik, korisnik.ime, korisnik.prezime,zahtjev_za_sudjelovanje.potvrda 
    from korisnik,zahtjev_za_sudjelovanje where korisnik.uloga_id_uloga='3' AND korisnik.id_korisnik=zahtjev_za_sudjelovanje.id_korisnik
    AND zahtjev_za_sudjelovanje.potvrda='1' AND zahtjev_za_sudjelovanje.id_projekt='{$_GET['idproj']}' ";
    $veza = new Baza();
    $veza->spojiDB();
    $rezultat = $veza->selectDB($upit);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($rezultat)) {
        if ($red) {
            echo "<option value='{$red['id_korisnik']}'>{$red['ime']} {$red['prezime']}</option>";
        }
    }
}
