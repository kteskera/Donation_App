<?php
require "../zaglavlje.php";
function KreirajPadajuciIzbornik()
{
   if($_SESSION['uloga']==='1'){
    $query = "Select * from kategorija";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($result)) {
        echo "<option value='{$red['id_kategorija']}'>{$red['naziv_kategorije']}</option>";
    }

   }else if($_SESSION['uloga']>1){
    $query = "Select * from kategorija,odabir_moderatora where kategorija.id_kategorija=odabir_moderatora.id_kategorija AND odabir_moderatora.id_korisnik='{$_SESSION['id_korisnik']}'";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($result)) {
        echo "<option value='{$red['id_kategorija']}'>{$red['naziv_kategorije']}</option>";
    }
   }
}
UpravljajSesijom("../log/trajanjesesije.conf",$putanja = dirname(getcwd()));

if (isset($_SESSION['id_korisnik']) && $_SESSION['uloga']<='2') {
$smarty = new Smarty();
$smarty->setTemplateDir("../templates")
    ->setCompileDir("../templates_c")
    ->setConfigDir("../configs")
    ->setCacheDir("../cache");
$putanja = dirname($_SERVER["REQUEST_URI"], 2);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Popis projekata");
$smarty->assign("description", "Popis projekata");
$smarty->assign("keywords", "Popis projekata");
$smarty->assign("korime", $korime);
$smarty->assign("status", $status);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->display("popisprojekata.tpl");
$smarty->display("uvijeti.tpl");
$smarty->assign("validacija", "kategorije/popiskategorija.php");
$smarty->display("podnozje.tpl");
}else{
    header("Location:../index.php");
}
