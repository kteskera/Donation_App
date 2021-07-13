<?php
require "zaglavlje.php";

UpravljajSesijom("log/trajanjesesije.conf",$putanja = getcwd());
$smarty = new Smarty();
$smarty->assign("status",$status);
$smarty->assign("korime",$korime);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("index.tpl");
$smarty->display("uvijeti.tpl");

?>


