<?php require "../zaglavlje.php";
$greske = "";
$style = array();
function DohvatiKompetencije()
{
  $query = "SELECT * from kompetencije";
  $veza = new Baza();
  $veza->spojiDB();
  $result = $veza->selectDB($query);
  $veza->zatvoriDB();
  while ($red = mysqli_fetch_array($result)) {
    echo
      "<tr>"
        . "<td> {$red['naziv']} </td>"
        . "<td><a href='../dohvati_podatke/ukloni.php?idkom={$red['id_kompetencije']}'><i class='fa fa-trash-o' aria-hidden='true'></i></a> </td>"
        . "</tr>";
  }
}
if (isset($_POST['kreirajkomp'])) {
  $i = 0;
  foreach ($_POST as $k => $v) {
    if (empty($v)) {
      $greske .= "Nije popunjeno: " . $k . "<br>";
      $style[$i] = 'style="border:1px solid red"';
      $i++;
    }
  }
  if (empty($greske)) {
    $naziv = $_POST['nazivkomp'];
    $query = "INSERT INTO kompetencije(naziv) values ('{$naziv}')";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    dodaj_zapis($putanja = dirname(getcwd()), "Rad s bazom", $query, "");
    header("Location: postavke.php");
  }
}

function DohvatiKorisnike()
{
  $query = "SELECT * from korisnik";
  $veza = new Baza();
  $veza->spojiDB();
  $result = $veza->selectDB($query);
  $veza->zatvoriDB();
  while ($red = mysqli_fetch_array($result)) {
    if ($red['blokiran_racun'] === 0 || empty($red['blokiran_racun'])) {
      $status = "Aktivan";
      $poveznica = "<a href='../dohvati_podatke/ukloni.php?idblok={$red['id_korisnik']}'><i class='fa fa-ban' aria-hidden='true'></i> Blokiraj</a>";
    } else if ($red['blokiran_racun'] === '1') {
      $status = "Blokiran";
      $poveznica = "<a href='../dohvati_podatke/ukloni.php?iddeblok={$red['id_korisnik']}'><i class='fa fa-ban' aria-hidden='true'></i> Odblokiraj</a>";
    }
    if (empty($red['uvjeti'])) {
      $uvijeti = "Nepotvrđeni";
      $poveznica2 = "-";
    } else {
      $uvijeti = "Potvrđeni";
      $poveznica2 = "<a href='../dohvati_podatke/ukloni.php?idrest={$red['id_korisnik']}'><i class='fa fa-eraser' aria-hidden='true'></i></i></a> ";
    }
    echo
      "<tr>"
        . "<td> {$red['ime']} {$red['prezime']} </td>"
        . "<td> {$red['korisnicko_ime']} </td>"
        . "<td> {$status} </td>"
        . "<td>{$poveznica}</td>"
        . "<td> {$uvijeti} </td>"
        . "<td>{$poveznica2}</td>"
        . "</tr>";
  }
}

if (isset($_POST['virtualnovrijemekrei'])) {
  $nacin = $_POST['pomak'];
  $url = "http://barka.foi.hr/WebDiP/pomak_vremena/pomak.php?format={$nacin}";

  if (!($fp = fopen($url, 'r'))) {
    echo "Problem: nije moguće otvoriti url: " . $url;
    exit;
  }
  switch ($nacin) {
    case "json":
      $string = fread($fp, 10000);
      $json = json_decode($string, false);
      $sati = $json->WebDiP->vrijeme->pomak->brojSati;
      $sati = (is_numeric($sati)) ? $sati : 0;
      fclose($fp);
      $var["konfiguracija"]["pomak"] = $sati;
      $string = json_encode($var);
      break;
    case "xml":
      break;
    default:
      $string = "";
      break;
  }
  $direktorij = dirname(getcwd());
  $fp = fopen("$direktorij/json/konfiguracija.json", "w");
  fwrite($fp, $string);
  fclose($fp);
}

function kreirajdnevnik()
{
  $ascPolje = vrati_zapis("../log/dnevnik.log");
  foreach ($ascPolje as $key => $value) {
    if (empty(trim($value)) ||  trim($value) === "" || trim($value) === null) {
      break;
    } else {
      $polje = explode("[]", $value);
      if (empty(trim($polje[2])) ||  trim($polje[2]) === "" || trim($polje[2]) === null) {
        $pomocna = "-";
      } else {
        $pomocna = $polje[2];
      }
      if (empty(trim($polje[4])) ||  trim($polje[4]) === "" || trim($polje[4]) === null) {
        $pomocna2 = "-";
      } else {
        $pomocna2 = $polje[4];
      }
      echo
        "<tr>"
          . "<td> {$polje[0]} </td>"
          . "<td> {$polje[1]} </td>"
          . "<td> {$pomocna} </td>"
          . "<td> {$polje[3]} </td>"
          . "<td> {$pomocna2} </td>"
          . "</tr>";
    }
  }
}
if (isset($_COOKIE) && isset($_POST['cookie'])) {
  if (!empty($_POST['trajanjekolacica'])) {
    foreach ($_COOKIE as $name => $value) {
      setcookie($name, $value,  time() + (86400 * $_POST['trajanjekolacica']), "/");
    }
  }
}

function KreirajPadajuciIzbornik()
{
  $query = "Select * from korisnik where uloga_id_uloga>1";
  $veza = new Baza();
  $veza->spojiDB();
  $result = $veza->selectDB($query);
  $veza->zatvoriDB();
  while ($red = mysqli_fetch_array($result)) {
    echo "<option value='{$red['id_korisnik']}'>{$red['ime']} {$red['prezime']}</option>";
  }
}

UpravljajSesijom("../log/trajanjesesije.conf", $putanja = dirname(getcwd()));

if (isset($_POST['vrijemesesijebtnn'])) {
  if (!empty($_POST['vrijemesesije'])) {
    ZapisiSesiju("../log/trajanjesesije.conf", $_POST['vrijemesesije']);
  }
}

if (isset($_SESSION['id_korisnik']) && $_SESSION['uloga'] === '1') {
  $smarty = new Smarty();
  $smarty->setTemplateDir("../templates")
    ->setCompileDir("../templates_c")
    ->setConfigDir("../configs")
    ->setCacheDir("../cache");
  $putanja = dirname($_SERVER["REQUEST_URI"], 2);
  $smarty->assign("putanja", $putanja);
  $smarty->assign("title", "Postavke");
  $smarty->assign("description", "Postavke");
  $smarty->assign("keywords", "Postavke");
  $smarty->assign("status", $status);
  $smarty->assign("korime", $korime);
  $smarty->assign("id_korisnik", $id_korisnik);
  $smarty->display("zaglavlje.tpl");
  $smarty->assign("greske", $greske);
  $smarty->assign("style", $style);
  $smarty->display("postavke.tpl");
  $smarty->display("uvijeti.tpl");
  $smarty->assign("validacija", "postavke.php");
  $smarty->display("podnozje.tpl");
} else {
  header("Location: ../index.php");
}
