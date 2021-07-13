<?php 
require "zaglavlje.php";
$smarty = new Smarty();
$putanja = dirname($_SERVER["REQUEST_URI"]);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Dokumentacija");
$smarty->assign("description", "Dokumentacija");
$smarty->assign("keywords", "Dokumentacija");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->display("dokumentacija.tpl");
$smarty->display("uvijeti.tpl");
$smarty->assign("validacija", "dokumentacija.php");
$smarty->display("podnozje.tpl");

UpravljajSesijom("log/trajanjesesije.conf",$putanja = getcwd());
?>