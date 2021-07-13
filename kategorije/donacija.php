<?php
require "../zaglavlje.php";

function KreirajList()
{
  $query = "Select * from kategorija";
  $veza = new Baza();
  $veza->spojiDB();
  $result = $veza->selectDB($query);
  $veza->zatvoriDB();
  while ($red = mysqli_fetch_array($result)) {
    echo "<option value='{$red['id_kategorija']}'>{$red['naziv_kategorije']}</option>";
  }
}
UpravljajSesijom("../log/trajanjesesije.conf",$putanja = dirname(getcwd()));

if (isset($_SESSION['id_korisnik']) && $_SESSION['uloga'] <= '3') {
  $smarty = new Smarty();
  $smarty->setTemplateDir("../templates")
    ->setCompileDir("../templates_c")
    ->setConfigDir("../configs")
    ->setCacheDir("../cache");
  $putanja = dirname($_SERVER["REQUEST_URI"], 2);
  $smarty->assign("putanja", $putanja);
  $smarty->assign("title", "Donacija");
  $smarty->assign("description", "Donacija");
  $smarty->assign("keywords", "Donacija");
  $smarty->assign("status", $status);
  $smarty->assign("korime", $korime);
  $smarty->assign("id_korisnik", $id_korisnik);
  $smarty->display("zaglavlje.tpl");
  $smarty->display("donacija.tpl");
  $smarty->display("uvijeti.tpl");
  $smarty->assign("validacija", "korisnici.php");
  $smarty->display("podnozje.tpl");
} else {
  header("Location:../index.php");
}
