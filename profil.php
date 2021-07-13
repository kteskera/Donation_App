<?php
require "zaglavlje.php";
$greske = "";
$style = array();
UpravljajSesijom("log/trajanjesesije.conf", $putanja = getcwd());

if (isset($_SESSION['id_korisnik']) && $_SESSION['uloga'] === '1') {
    function KreirajTablicuZadataka()
    {
        $query = "SELECT distinct zadatak.id_zadatak,zadatak.id_korisnik,zadatak.id_projekt,zadatak.opis,zadatak.datum_pocetka,zadatak.datum_zavrsetka, projekt.naziv_projekta, kategorija.naziv_kategorije 
     from zadatak,projekt,kategorija,korisnik
      where zadatak.id_projekt=projekt.id_projekt AND projekt.id_kategorija=kategorija.id_kategorija";

        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();

        while ($red = mysqli_fetch_array($result)) {
            if (!empty($red['datum_zavrsetka'])) {
                $poveznica = "Zadatak riješen!";
                $poveznica2 = "<a href=\"rijesizadatak.php?iduredi={$red['id_zadatak']}\"><i class='fa fa-pencil-square' aria-hidden='true'></i></a>";
            } else {
                $poveznica = "<a href=\"rijesizadatak.php?id={$red['id_zadatak']}\"><i class='fa fa-pencil-square' aria-hidden='true'></i></a>";
                $poveznica2 = "-";
            }

            echo
                "<tr>"
                    . "<td> {$red['naziv_projekta']} </td>"
                    . "<td> {$red['naziv_kategorije']} </td>"
                    . "<td> {$red['opis']} </td>"
                    . "<td> {$red['datum_pocetka']} </td>"
                    . "<td> {$red['datum_zavrsetka']} </td>"
                    . "<td> {$poveznica} </td>"
                    . "<td> {$poveznica2} </td>"
                    . "</tr>";
        }
    }
} else {
    function KreirajTablicuZadataka()
    {
        $query = "SELECT distinct zadatak.id_zadatak,zadatak.id_korisnik,zadatak.id_projekt,zadatak.opis,zadatak.datum_pocetka,zadatak.datum_zavrsetka, projekt.naziv_projekta, kategorija.naziv_kategorije 
     from zadatak,projekt,kategorija,korisnik
      where zadatak.id_projekt=projekt.id_projekt AND projekt.id_kategorija=kategorija.id_kategorija
      AND zadatak.id_korisnik='{$_SESSION['id_korisnik']}'";
        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();

        while ($red = mysqli_fetch_array($result)) {
            if (!empty($red['datum_zavrsetka'])) {
                $poveznica = "Zadatak riješen!";
                $poveznica2 = "<a href=\"rijesizadatak.php?iduredi={$red['id_zadatak']}\"><i class='fa fa-pencil-square' aria-hidden='true'></i></a>";
            } else {
                $poveznica = "<a href=\"rijesizadatak.php?id={$red['id_zadatak']}\"><i class='fa fa-pencil-square' aria-hidden='true'></i></a>";
                $poveznica2 = "-";
            }

            echo
                "<tr>"
                    . "<td> {$red['naziv_projekta']} </td>"
                    . "<td> {$red['naziv_kategorije']} </td>"
                    . "<td> {$red['opis']} </td>"
                    . "<td> {$red['datum_pocetka']} </td>"
                    . "<td> {$red['datum_zavrsetka']} </td>"
                    . "<td> {$poveznica} </td>"
                    . "<td> {$poveznica2} </td>"
                    . "</tr>";
        }
    }
}

if (isset($_SESSION['id_korisnik']) && $_SESSION['uloga'] === '1') {
function KreirajTablicuZahtjeva()
{
    $query = "SELECT zahtjev_za_sudjelovanje.id_zahtjev_za_sujedjelovanje,
    zahtjev_za_sudjelovanje.opis
    ,zahtjev_za_sudjelovanje.datum_zahtjeva,
    zahtjev_za_sudjelovanje.potvrda,
    projekt.naziv_projekta
      from zahtjev_za_sudjelovanje,projekt where  zahtjev_za_sudjelovanje.id_projekt=projekt.id_projekt";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($result)) {

        if (empty($red['potvrda']) || $red['potvrda'] === '0') {
            $potvrda = "Neprihvaćeno";
            $potvrdi = "<a href='prihvati.php?id={$red['id_zahtjev_za_sujedjelovanje']}'><i class='fa fa-check' aria-hidden='true'></i></a>";
        }
        if ($red['potvrda'] === '1') {
            $potvrda = "Prihvaćeno";
            $potvrdi = "-";
        }
        echo
            "<tr>"
                . "<td> {$red['naziv_projekta']} </td>"
                . "<td> {$red['opis']} </td>"
                . "<td> {$red['datum_zahtjeva']} </td>"
                . "<td>  {$potvrda} </td>"
                . "<td> {$potvrdi} </td>"
                . "</tr>";
    }
}
}
else{
    function KreirajTablicuZahtjeva()
{
    $query = "SELECT zahtjev_za_sudjelovanje.id_zahtjev_za_sujedjelovanje,
    zahtjev_za_sudjelovanje.opis
    ,zahtjev_za_sudjelovanje.datum_zahtjeva,
    zahtjev_za_sudjelovanje.potvrda,
    projekt.naziv_projekta
      from zahtjev_za_sudjelovanje,projekt 
      where zahtjev_za_sudjelovanje.id_korisnik='{$_SESSION['id_korisnik']}' 
      AND zahtjev_za_sudjelovanje.id_projekt=projekt.id_projekt";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($result)) {

        if (empty($red['potvrda']) || $red['potvrda'] === '0') {
            $potvrda = "Neprihvaćeno";
            $potvrdi = "<a href='prihvati.php?id={$red['id_zahtjev_za_sujedjelovanje']}'><i class='fa fa-check' aria-hidden='true'></i></a>";
        }
        if ($red['potvrda'] === '1') {
            $potvrda = "Prihvaćeno";
            $potvrdi = "-";
        }
        echo
            "<tr>"
                . "<td> {$red['naziv_projekta']} </td>"
                . "<td> {$red['opis']} </td>"
                . "<td> {$red['datum_zahtjeva']} </td>"
                . "<td>  {$potvrda} </td>"
                . "<td> {$potvrdi} </td>"
                . "</tr>";
    }
}

}



function DohvatiKompetencije()
{
    $query = "SELECT * from odabir_kompetencije,kompetencije where odabir_kompetencije.id_kompetencije=kompetencije.id_kompetencije AND odabir_kompetencije.id_korisnik='{$_SESSION['id_korisnik']}'";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($result)) {
        echo
            "<tr>"
                . "<td> {$red['naziv']} </td>"
                . "<td> {$red['datum_odabira']} </td>"
                . "<td> <a href='dohvati_podatke/ukloni.php?id={$red['id_odabir_kompetencije']}'><i class='fa fa-times' aria-hidden='true'></i></a> </td>"
                . "</tr>";
    }
}

function KreirajPadajuciIzbornikKompetencija()
{
    $query = "SELECT * from kompetencije";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($result)) {
        echo "<option value='{$red['id_kompetencije']}'>{$red['naziv']}</option>";
    }
}
if (isset($_POST['dodajkompetenciju'])) {
    $query = "SELECT * from odabir_kompetencije where id_korisnik={$_SESSION['id_korisnik']} and id_kompetencije='{$_POST['selekcijakompetencija']}'";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    $red = mysqli_fetch_array($result);
    if (!isset($red) || empty($red)) {
        $datum = date("Y-m-d H:i:s");
        $query = "INSERT INTO `odabir_kompetencije`(`id_korisnik`, `id_kompetencije`, `datum_odabira`) VALUES ('{$_SESSION['id_korisnik']}','{$_POST['selekcijakompetencija']}','{$datum}')";
        $veza = new Baza();
        $veza->spojiDB();
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();
        dodaj_zapis($putanja = getcwd(), "Rad s bazom", $query, "");
    } else {
        echo "Kompetencija je već odabrana!";
    }
}

if (isset($_SESSION['id_korisnik'])) {
    $smarty = new Smarty();
    $putanja = dirname($_SERVER["REQUEST_URI"]);
    $smarty->assign("putanja", $putanja);
    $smarty->assign("title", "Profil");
    $smarty->assign("description", "Profil");
    $smarty->assign("keywords", "Profil");
    $smarty->assign("status", $status);
    $smarty->assign("korime", $korime);
    $smarty->assign("id_korisnik", $id_korisnik);
    $smarty->display("zaglavlje.tpl");
    $smarty->assign("greske", $greske);
    $smarty->assign("style", $style);
    $smarty->display("profil.tpl");
    $smarty->display("uvijeti.tpl");
    $smarty->assign("validacija", "kategorije.php");
    $smarty->display("podnozje.tpl");
} else {
    header("Location:index.php");
}
