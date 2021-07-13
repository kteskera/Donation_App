<?php 
require "../zaglavlje.php";
global $greske;
global $style;

if(isset($_POST['submit'])){
    if (isset($_GET['id'])) {
      if(empty($_POST['iznos'])){
          $greske .= "Polje: Iznos ne smije ostati prazno!" . "<br>";
          $style = 'style="border:1px solid red"';
      }
      if(empty($greske)){
        $datum = IspisVirtualnogVremena($putanja=dirname(getcwd()));
        $id_projekt = $_GET['id'];
        $id_korisnik = $_SESSION['id_korisnik'];
        $iznos = $_POST['iznos'];
        $query = "INSERT INTO donacija(id_projekt,id_korisnik,iznos,datum_donacije) VALUES('{$id_projekt}','{$id_korisnik}','{$iznos}','{$datum}')";
        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();
        dodaj_zapis($putanja=dirname(getcwd()),"Rad s bazom",$query,"");
        header("Location: donacija.php");
      }
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
$smarty->assign("title", "Doniraj");
$smarty->assign("description", "Doniraj");
$smarty->assign("keywords", "Doniraj");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("greske",$greske);
$smarty->assign("style",$style);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("doniraj.tpl");
$smarty->assign("validacija", "doniraj.php");
$smarty->display("podnozje.tpl");
