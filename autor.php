<?php 
require "zaglavlje.php";
$smarty = new Smarty();
$putanja = dirname($_SERVER["REQUEST_URI"]);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Autor");
$smarty->assign("description", "Autor");
$smarty->assign("keywords", "Plan , Test");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->display("autor.tpl");
$smarty->display("uvijeti.tpl");
$smarty->assign("validacija", "autor.php");
$smarty->display("podnozje.tpl");

UpravljajSesijom("log/trajanjesesije.conf",$putanja = getcwd());
?>