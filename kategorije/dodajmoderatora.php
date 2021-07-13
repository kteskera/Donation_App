<?php
require "../zaglavlje.php";
if (isset($_GET["id"])) {

    function DohvatiNaslov()
    {
        $query = "Select naziv_kategorije from kategorija where id_kategorija={$_GET['id']}";
        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();
        while ($red = mysqli_fetch_array($result)) {
            $naslovKategorije = $red['naziv_kategorije'];
        }
        if (isset($naslovKategorije)) {
            return $naslovKategorije;
        }
    }
    $query = "Select distinct korisnik.id_korisnik, korisnik.ime, korisnik.prezime from korisnik right join odabir_moderatora on odabir_moderatora.id_kategorija={$_GET['id']} AND odabir_moderatora.id_korisnik=korisnik.id_korisnik";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();

    function KreirajPopis($rezultat)
    {
        while ($red = mysqli_fetch_array($rezultat)) {
            if (!empty($red['id_korisnik'])) {
                echo "<option value='{$red['id_korisnik']}'>{$red['ime']} {$red['prezime']}</option>";
            }
        }
    }
    function GenerirajComboBox()
    {
        $query = "Select id_korisnik, ime, prezime from korisnik where uloga_id_uloga=2";
        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();
        while ($red = mysqli_fetch_array($result)) {
            echo "<option value='{$red['id_korisnik']}'>{$red['ime']} {$red['prezime']}</option>";
        }
    }
    if (isset($_POST["spremiodabir"])) {
        $upit = "select id_korisnik from odabir_moderatora where odabir_moderatora.id_korisnik={$_POST['selekcija']} AND odabir_moderatora.id_kategorija={$_GET['id']}";
        $veza = new Baza();
        $veza->spojiDB();
        $rez = $veza->selectDB($upit);
        $veza->zatvoriDB();
        $spremi = "";
        while ($row = mysqli_fetch_array($rez)) {
            $spremi = $row['id_korisnik'];
        }
        if ($spremi === $_POST['selekcija']) {
            echo "Već je dodan!";
        } else {
            $query2 = "insert into odabir_moderatora values({$_POST['selekcija']},{$_GET['id']})";
            $veza = new Baza();
            $veza->spojiDB();
            $result2 = $veza->selectDB($query2);
            $veza->zatvoriDB();
            echo "Uspješno dodan moderator!";
            dodaj_zapis($putanja = dirname(getcwd()), "Rad s bazom", $query2,"");
            header("Location: popiskategorija.php");
        }
    } else if (isset($_POST["obrisi"])) {
        $upit = "delete from odabir_moderatora where id_korisnik={$_POST['selekcija2']} AND id_kategorija={$_GET['id']}";
        $veza = new Baza();
        $veza->spojiDB();
        $rez = $veza->selectDB($upit);
        $veza->zatvoriDB();
        echo "Uspješno obrisan moderator!";
        header("Location: popiskategorija.php");
        dodaj_zapis($putanja = dirname(getcwd()), "Rad s bazom", $upit,"");
    }
}
UpravljajSesijom("../log/trajanjesesije.conf",$putanja = dirname(getcwd()));
$smarty = new Smarty();
$smarty->setTemplateDir("../templates")
    ->setCompileDir("../templates_c")
    ->setConfigDir("../configs")
    ->setCacheDir("../cache");
$putanja = dirname($_SERVER["REQUEST_URI"], 2);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Uredi");
$smarty->assign("description", "uredi");
$smarty->assign("keywords", "uredi");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik", $id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("result", $result);
$smarty->display("dodajmoderatora.tpl");
$smarty->assign("validacija", "kategorije/popiskategorija.php");
$smarty->display("podnozje.tpl");
