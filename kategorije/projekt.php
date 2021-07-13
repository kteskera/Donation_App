<?php
require "../zaglavlje.php";
global $naziv;
global $akronim;
global $datumpocetka;
global $datumzavrsetka;
global $opiszahtjeva;
global $miniznos;
global $stanje;
global $greske;
$style = array();
if (isset($_GET['id'])) {
  $var = $_GET['id'];
  $veza = new Baza();
  $veza->spojiDB();
  $upit = "SELECT * from projekt where id_projekt={$var}";
  $rezultat = $veza->selectDB($upit);
  $veza->zatvoriDB();
  while ($red = mysqli_fetch_array($rezultat)) {
    if ($red) {
      $naziv = $red['naziv_projekta'];
      $akronim = $red['akronim'];
      $datumpocetka =  Konverzija($red['datum_pocetka']);
      $datumzavrsetka =  Konverzija($red['datum_zavrsetka']);
      $opiszahtjeva =  $red['opis_zahtjeva'];
      $miniznos =  $red['min_iznos_donacija'];
      $stanje = "Ažuriraj";
    }
  }
  if (isset($_POST['submit'])) {
    foreach ($_POST as $k => $v) {
      if ($k === "naziv" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[0] = 'style="border:1px solid red"';
      }
      if ($k === "akronim" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[1] = 'style="border:1px solid red"';
      }
      if ($k === "datumpocetka" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[2] = 'style="border:1px solid red"';
      }
      if ($k === "datumzavrsetka" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[3] = 'style="border:1px solid red"';
      }
      if ($k === "opiszahtjeva" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[4] = 'style="border:1px solid red"';
      }
      if ($k === "miniznos" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[5] = 'style="border:1px solid red"';
      }
    }
    if (empty($greske)) {
      $veza = new Baza();
      $veza->spojiDB();
      $upit = "UPDATE `projekt` SET `naziv_projekta`='{$_POST['naziv']}',`akronim`='{$_POST['akronim']}',`datum_pocetka`='{$_POST['datumpocetka']}',`datum_zavrsetka`='{$_POST['datumzavrsetka']}',`opis_zahtjeva`='{$_POST['opiszahtjeva']}',`min_iznos_donacija`='{$_POST['miniznos']}' WHERE id_projekt={$var}";
      $rezultat = $veza->selectDB($upit);
      $veza->zatvoriDB();
      dodaj_zapis($putanja=dirname(getcwd()),"Rad s bazom",$upit,"");
      header("Location: popisprojekata.php");
    }
  }
}
if (!isset($_GET['id'])) {
  $kategorija = $_GET['selekcijakategorije'];
  $stanje = "Kreiraj";
  if (isset($_POST['submit'])) {
    foreach ($_POST as $k => $v) {
      if ($k === "naziv" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[0] = 'style="border:1px solid red"';
      }
      if ($k === "akronim" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[1] = 'style="border:1px solid red"';
      }
      if ($k === "datumpocetka" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[2] = 'style="border:1px solid red"';
      }
      if ($k === "datumzavrsetka" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[3] = 'style="border:1px solid red"';
      }
      if ($k === "opiszahtjeva" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[4] = 'style="border:1px solid red"';
      }
      if ($k === "miniznos" && empty($v)) {
        $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
        $style[5] = 'style="border:1px solid red"';
      }
    }
    if (empty($greske)) {
      $naziv = $_POST['naziv'];
      $akronim = $_POST['akronim'];
      $datumpocetka = $_POST['datumpocetka'];
      $datumzavrsetka = $_POST['datumzavrsetka'];
      $opiszahtjeva = $_POST['opiszahtjeva'];
      $miniznos = $_POST['miniznos'];
      $veza = new Baza();
      $veza->spojiDB();
      $query = "INSERT INTO `projekt`( `id_kategorija`, `naziv_projekta`, `akronim`, `datum_pocetka`, `datum_zavrsetka`, `opis_zahtjeva`, `min_iznos_donacija`) VALUES ('{$kategorija}','{$naziv}','{$akronim}','{$datumpocetka}','{$datumzavrsetka}','{$opiszahtjeva}','{$miniznos}')";
      $rezultat = $veza->selectDB($query);
      $veza->zatvoriDB();
      header("Location: popisprojekata.php");
      dodaj_zapis($putanja=dirname(getcwd()),"Rad s bazom",$query,"");
    
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
$smarty->assign("title", "Projekt");
$smarty->assign("description", "Projekt");
$smarty->assign("keywords", "Projekt");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("naziv", $naziv);
$smarty->assign("akronim", $akronim);
$smarty->assign("datumpocetka", $datumpocetka);
$smarty->assign("datumzavrsetka", $datumzavrsetka);
$smarty->assign("opiszahtjeva", $opiszahtjeva);
$smarty->assign("stanje", $stanje);
$smarty->assign("miniznos", $miniznos);
$smarty->assign("greske", $greske);
$smarty->assign("style", $style);
$smarty->display("projekt.tpl");
$smarty->assign("validacija", "kategorije.php");
$smarty->display("podnozje.tpl");
}else{
  header("Location:../index.php");
}
function Konverzija($mysql_date_string)
{
    $HTML_DATETIME_LOCAL = 'Y-m-d\TH:i';
    $php_timestamp = strtotime($mysql_date_string);
    $html_datetime_string = date($HTML_DATETIME_LOCAL, $php_timestamp);
    return $html_datetime_string;
}
