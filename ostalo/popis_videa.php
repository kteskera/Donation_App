<?php 
require "../zaglavlje.php";

if (isset($_GET['id'])) {
  $veza= new Baza();
  $veza->spojiDB();
  $upit = "Select distinct * from video, zadatak, projekt where video.vidljivost='1' AND video.id_zadatak=zadatak.id_zadatak AND zadatak.id_projekt=projekt.id_projekt and projekt.id_kategorija='{$_GET['id']}'";
  $upit2 = "Select distinct naziv_projekta from projekt where id_kategorija={$_GET['id']}";
  $rezultat = $veza->selectDB($upit);
  $rezultat2 = $veza->selectDB($upit2);
  $veza->zatvoriDB();
}
function kreirajVideo($rezultat,$rezultat2){
  $putanja = dirname($_SERVER["REQUEST_URI"], 2);
  $red2 = mysqli_fetch_array($rezultat2);
  
  
  while ($red = mysqli_fetch_array($rezultat)) {
    echo
    "
    <div class='rowMul'>
    <div class='columnMul'>
    <h2 class='naslovClanakMul'>Projekt: {$red2['naziv_projekta']}</h2>
      <h2 class='naslovClanakMul' style='color: rgb(76,152,175)'>{$red['naziv_videa']}</h2>
      <video controls>
        <source src='{$putanja}/{$red['lokacija']}' type='video/mp4' alt='video'>
      </video>
    </div>";
  }
}
UpravljajSesijom("../log/trajanjesesije.conf",$putanja = dirname(getcwd()));
 $smarty = new Smarty();
 $smarty->setTemplateDir("../templates")
   ->setCompileDir("../templates_c")
   ->setConfigDir("../configs")
   ->setCacheDir("../cache");
 $putanja = dirname($_SERVER["REQUEST_URI"], 2);
 $smarty->assign("putanja", $putanja);
 $smarty->assign("title", "Video");
 $smarty->assign("description", "Video.");
 $smarty->assign("keywords", "Video");
 $smarty->assign("status", $status);
 $smarty->assign("korime", $korime);
 $smarty->assign("id_korisnik",$id_korisnik);
 $smarty->display("zaglavlje.tpl");
 $smarty->assign("rezultat", $rezultat);
 $smarty->assign("rezultat2", $rezultat2);
 $smarty->display("popis_videa.tpl");
 $smarty->display("uvijeti.tpl");
 $smarty->assign("validacija", "ostalo/popis_videa.php");
 $smarty->display("podnozje.tpl");



?>
