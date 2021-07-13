<?php
require "../zaglavlje.php";
$query = "Select * from kategorija";
$veza = new Baza();
$veza->spojiDB();
$result = $veza->selectDB($query);
$veza->zatvoriDB();
function KreirajTablicu($rezultat)
{
    while ($red = mysqli_fetch_array($rezultat)) {
        $query = "Select distinct korisnik.ime, korisnik.prezime from korisnik,odabir_moderatora,kategorija where korisnik.id_korisnik=odabir_moderatora.id_korisnik AND odabir_moderatora.id_kategorija={$red['id_kategorija']}";
        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();
        $spremisna = "";
        while ($red2 = mysqli_fetch_array($result)) {
            $spremisna .= $red2['ime'] . " " . $red2['prezime'] . "<br>";
        }
        echo
            "<tr>"
                . "<td> {$red['naziv_kategorije']} </td>"
                . "<td> <a href=\"obrisi.php?idkat={$red['id_kategorija']}\"><i class='fa fa-trash' aria-hidden='true'></i></a></td>"
                . "<td> $spremisna</td>"
                . "<td> <a href=\"dodajmoderatora.php?id={$red['id_kategorija']}\">Odaberi</a></td>"
                . "</tr>";
    }
}

if (isset($_POST['kreirajkatbtn'])) {
    $naziv = $_POST['nazivkat'];
    $query = "INSERT INTO kategorija(naziv_kategorije) values ('{$naziv}')";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    dodaj_zapis($putanja=dirname(getcwd()),"Rad s bazom",$query,"");
    header("Location: popiskategorija.php");
}


UpravljajSesijom("../log/trajanjesesije.conf",$putanja = dirname(getcwd()));

if (isset($_SESSION['id_korisnik']) && $_SESSION['uloga']==='1') {
$smarty = new Smarty();
$smarty->setTemplateDir("../templates")
    ->setCompileDir("../templates_c")
    ->setConfigDir("../configs")
    ->setCacheDir("../cache");
$putanja = dirname($_SERVER["REQUEST_URI"], 2);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Popis kategorija");
$smarty->assign("description", "Popis kategorija");
$smarty->assign("keywords", "Popis kategorija");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik",$id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("result", $result);
$smarty->display("popiskategorija.tpl");
$smarty->display("uvijeti.tpl");
$smarty->assign("validacija", "kategorije/popiskategorija.php");
$smarty->display("podnozje.tpl");
}else{
header("Location:../index.php");
}