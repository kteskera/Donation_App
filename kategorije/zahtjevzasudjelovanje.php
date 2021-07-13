<?php
require "../zaglavlje.php";

global $greske;
$style = array();
function KreirajPadajuciIzbornik2()
{

    if ($_SESSION["uloga"] === '1') {
        $query = "SELECT * from projekt,kategorija,odabir_moderatora where projekt.id_kategorija=kategorija.id_kategorija AND kategorija.id_kategorija=odabir_moderatora.id_kategorija";
        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();
        while ($red = mysqli_fetch_array($result)) {
            echo "<option value='{$red['id_projekt']}'>{$red['naziv_projekta']}</option>";
        }
    } else if ($_SESSION["uloga"] > 1) {
        $query = "SELECT * from projekt,kategorija,odabir_moderatora where projekt.id_kategorija=kategorija.id_kategorija AND kategorija.id_kategorija=odabir_moderatora.id_kategorija AND odabir_moderatora.id_korisnik='{$_SESSION['id_korisnik']}'";
        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();
        while ($red = mysqli_fetch_array($result)) {
            echo "<option value='{$red['id_projekt']}'>{$red['naziv_projekta']}</option>";
        }
    }
}



if (isset($_POST['submit'])) {
    if (isset($_GET['id'])) {
        foreach ($_POST as $k => $v) {
            if ($k === "opiszahtjeva" && empty($v)) {
                $greske .= "Polje: Opis zahtjeva smije ostati prazno!" . "<br>";
                $style[1] = 'style="border:1px solid red"';
            }
        }
        if (!isset($_POST['projekt'])|| $_POST['projekt']==='0') {
            $greske .= "Polje: Popis projekta ne smije ostati prazno!" . "<br>";
            $style[0] = 'style="border:1px solid red"';
        }
        $datum = IspisVirtualnogVremena($putanja = dirname(getcwd()));
        $id_projekt = $_POST['projekt'];
        $id_korisnik = $_GET['id'];
        $opis = $_POST['opiszahtjeva'];
        $query = "SELECT * from  zahtjev_za_sudjelovanje where id_projekt='{$id_projekt}' AND id_korisnik='{$id_korisnik}'";
        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();
        while ($red = mysqli_fetch_array($result)) {
            if ($red['id_projekt'] === $id_projekt && $red['id_korisnik'] === $id_korisnik) {
                $greske .= "Korisnik već sudjeluje na tom projektu!" . "<br>";
            }
        }
        if (empty($greske)) {
            $query = "INSERT INTO zahtjev_za_sudjelovanje(id_projekt,id_korisnik,opis,datum_zahtjeva) VALUES('{$id_projekt}','{$id_korisnik}','{$opis}','{$datum}')";
            $veza = new Baza();
            $veza->spojiDB();
            $result = $veza->selectDB($query);
            $veza->zatvoriDB();
            dodaj_zapis($putanja = dirname(getcwd()), "Rad s bazom", $query, "");
            header("Location:korisnici.php");
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
$smarty->assign("title", "Zadaci");
$smarty->assign("description", "Zadaci");
$smarty->assign("keywords", "Zadaci");
$smarty->assign("korime", $korime);
$smarty->assign("status", $status);
$smarty->assign("id_korisnik", $id_korisnik);
$smarty->assign("greske", $greske);
$smarty->assign("style", $style);
$smarty->display("zaglavlje.tpl");
$smarty->display("zahtjevzasudjelovanje.tpl");
$smarty->assign("validacija", "zadaci.php");
$smarty->display("podnozje.tpl");
}else{
    header("Location:../index.php");
}