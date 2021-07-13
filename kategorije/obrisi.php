<?php 
require "../zaglavlje.php";
global $napomena;
if(isset($_GET['id'])){
if(isset($_POST['da'])){
    $query = "delete from projekt where id_projekt={$_GET['id']}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    dodaj_zapis($putanja=dirname(getcwd()),"Rad s bazom",$query,"");
    header("Location: popisprojekata.php");
}else if(isset($_POST['ne'])){
header("Location: popisprojekata.php");
}
}else if(isset($_GET['idkat'])){
    $napomena="Ukoliko želite pobrisati kategoriju osigurajte da u kategoriji nema moderatora!";
    if(isset($_POST['da'])){
    $query = "delete from kategorija where id_kategorija={$_GET['idkat']}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    dodaj_zapis($putanja=dirname(getcwd()),"Rad s bazom",$query,"");
    $veza->zatvoriDB();
    header("Location: popiskategorija.php");
}else if(isset($_POST['ne'])){
header("Location: popiskategorija.php");
}}else if(isset($_GET['idzad'])){
    if(isset($_POST['da'])){
    $query = "delete from zadatak where id_zadatak={$_GET['idzad']}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    dodaj_zapis($putanja=dirname(getcwd()),"Rad s bazom",$query,"");
    header("Location: zadaci.php");
}else if(isset($_POST['ne'])){
header("Location: zadaci.php");
}}

UpravljajSesijom("../log/trajanjesesije.conf",$putanja = dirname(getcwd()));
$smarty = new Smarty();
$smarty->setTemplateDir("../templates")
    ->setCompileDir("../templates_c")
    ->setConfigDir("../configs")
    ->setCacheDir("../cache");
$putanja = dirname($_SERVER["REQUEST_URI"], 2);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Obrisi");
$smarty->assign("description", "Obrisi");
$smarty->assign("keywords", "Obrisi");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("napomena", $napomena);
$smarty->display("obrisi.tpl");
$smarty->assign("validacija", "kategorija/obrisi.php");
$smarty->display("podnozje.tpl");


