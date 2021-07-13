<?php
require "../zaglavlje.php";

function KreirajPadajuciIzbornik(){

    $query = "Select * from kompetencije";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($result)) {
        echo "<option value='{$red['id_kompetencije']}'>{$red['naziv']}</option>";
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
$smarty->assign("title", "Korisnici");
$smarty->assign("description", "Korisnici");
$smarty->assign("keywords", "Korisnici");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->display("korisnici.tpl");
$smarty->display("uvijeti.tpl");
$smarty->assign("validacija", "korisnici.php");

$smarty->display("podnozje.tpl");

