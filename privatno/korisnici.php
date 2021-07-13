<?php
require "../zaglavlje.php";
function dohvatikorisnike()
{
    $query = "SELECT * from korisnik";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($result)) {
        echo
            "<tr>"
                . "<td> {$red['ime']} {$red['prezime']} </td>"
                . "<td> {$red['korisnicko_ime']} </td>"
                . "<td> {$red['email']} </td>"
                . "<td> {$red['lozinka']} </td>"
                . "<td> {$red['lozinka_sh1']} </td>"
                . "</tr>";
    }
}
$smarty = new Smarty();
$smarty->setTemplateDir("../templates")
  ->setCompileDir("../templates_c")
  ->setConfigDir("../configs")
  ->setCacheDir("../cache");
$putanja = dirname($_SERVER["REQUEST_URI"], 2);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Privatno");
$smarty->assign("description", "Privatno");
$smarty->assign("keywords", "Privatno");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik", $id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->display("privatno.tpl");
$smarty->assign("validacija", "postavke.php");
$smarty->display("podnozje.tpl");
