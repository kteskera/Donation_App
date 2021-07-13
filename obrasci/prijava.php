<?php
require "../zaglavlje.php";
global $greske;
global $poruka;
global $korsime;
$i = 0;
$style = array();

$use_sts = true;

if ($use_sts && isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
  header('Strict-Transport-Security: max-age=31536000');
} elseif ($use_sts) {
  header('Location: https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI'], 2), true, 301);
  die();
}

if (isset($_GET['submit'])) {
  foreach ($_GET as $k => $v) {
    if (empty($v)) {
      $greske .= "Nije popunjeno: " . $k . "<br>";
      $style[$i] = 'style="border:1px solid red"';
      $i++;
    }
  }
  if (empty($greske)) {
    $veza = new Baza();
    $veza->spojiDB();
    $korime = $_GET["korisnickoime"];
    $lozinka = $_GET["lozinka"];
    $upit = "SELECT * from korisnik WHERE korisnicko_ime='{$korime}' AND lozinka='{$lozinka}' AND potvrda_racuna='1' AND (blokiran_racun='0' OR blokiran_racun is null)";
    $rezultat = $veza->selectDB($upit);
    $veza->zatvoriDB();
    $autoriziran = false;
    while ($red = mysqli_fetch_array($rezultat)) {
      if ($red) {
        $autoriziran = true;
        $email = $red["email"];
        $id_uloga = $red["uloga_id_uloga"];
        $id_korisnik = $red["id_korisnik"];
        $uvjeti = $red["uvjeti"];
      }
    }
    if ($autoriziran) {
      $veza = new Baza();
      $veza->spojiDB();
      $upit = "UPDATE  korisnik  SET neuspjesna_prijava='0' where korisnicko_ime='{$korime}'AND lozinka='{$lozinka}'";
      $rezultat = $veza->selectDB($upit);
      $veza->zatvoriDB();
      $poruka = "Uspješna prijava! Pozdrav " . $korime . "!<br>";
      $status = "Odjava";
      Sesija::kreirajKorisnika($korime, $id_uloga, $id_korisnik);
      dodaj_zapis($putanja = dirname(getcwd()), "Prijava", "", "");
      $vrijeme = IspisVirtualnogVremena2($putanja = dirname(getcwd()));
      if (isset($_GET['zapamti'])) {
        setcookie("korisnicko_ime", $korime, $vrijeme + (86400 * 2), "/");
      }
      $sec = "2";
      header("Refresh: $sec; url=../profil.php");
    } else {
      $greske .= "Netočni podaci za prijavu ili korisnik ne postoji!" . "<br>";
      $style[0] = 'style="border:1px solid red"';
      $style[1] = 'style="border:1px solid red"';
      $veza = new Baza();
      $veza->spojiDB();
      $upit =  $upit = "SELECT * from korisnik WHERE korisnicko_ime='{$korime}'";
      $rezultat = $veza->selectDB($upit);
      $veza->zatvoriDB();
      $pom = "";
      while ($red = mysqli_fetch_array($rezultat)) {
        if ($red['neuspjesna_prijava'] === '0' || is_null($red['neuspjesna_prijava'])) {
          $pom = '1';
          dodaj_zapis($putanja = dirname(getcwd()), "Ostale radnje", "", "Neuspješna prijava 1");
        }
        if ($red['neuspjesna_prijava'] === '1') {
          $pom = '2';
          dodaj_zapis($putanja = dirname(getcwd()), "Ostale radnje", "", "Neuspješna prijava 2");
        }
        if ($red['neuspjesna_prijava'] === '2') {
          $pom = '3';
          dodaj_zapis($putanja = dirname(getcwd()), "Ostale radnje", "", "Neuspješna prijava, blokiran račun");
        }
      }
      if ($pom >= '3') {
        $veza->spojiDB();
        $upit = "UPDATE  korisnik  SET  blokiran_racun='1' where korisnicko_ime='{$korime}'";
        $rezultat = $veza->selectDB($upit);
        $veza->zatvoriDB();
      } else {
        $veza->spojiDB();
        $upit = "UPDATE  korisnik  SET neuspjesna_prijava='{$pom}' where korisnicko_ime='{$korime}'";
        $rezultat = $veza->selectDB($upit);
        $veza->zatvoriDB();
      }
    }
  }
}
if (isset($_COOKIE['korisnicko_ime'])) {
  $korsime = $_COOKIE['korisnicko_ime'];
}

$use_sts = true;

UpravljajSesijom("../log/trajanjesesije.conf",$putanja = dirname(getcwd()));
$smarty = new Smarty();
$smarty->setTemplateDir("../templates")
  ->setCompileDir("../templates_c")
  ->setConfigDir("../configs")
  ->setCacheDir("../cache");
$putanja = dirname($_SERVER["REQUEST_URI"], 2);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Prijava");
$smarty->assign("description", "Prijava registriranog korisnika. 29.3.2020.");
$smarty->assign("keywords", "Prijava, Login, Username");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik", $id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("greske", $greske);
$smarty->assign("poruka", $poruka);
$smarty->assign("style", $style);
$smarty->assign("korsime", $korsime);
$smarty->display("prijava.tpl");
$smarty->display("uvijeti.tpl");
$smarty->assign("validacija", "obrasci/prijava.php");
$smarty->display("podnozje.tpl");
