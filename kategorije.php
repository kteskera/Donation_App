<?php
require "zaglavlje.php";
$query2 = "select * from kategorija";
$query = "select kategorija.id_kategorija,kategorija.naziv_kategorije,count(projekt.id_projekt) as total ,projekt.id_projekt,projekt.naziv_projekta from kategorija  left join projekt on kategorija.id_kategorija=projekt.id_kategorija where (trenutni_iznos_donacija='0' OR trenutni_iznos_donacija is null OR trenutni_iznos_donacija <min_iznos_donacija) group by kategorija.naziv_kategorije";
$veza = new Baza();
$veza->spojiDB();
$result = $veza->selectDB($query);
$result2 = $veza->selectDB($query2);
$veza->zatvoriDB();
function KreirajTablicu($rezultat)
{
    while ($red = mysqli_fetch_array($rezultat)) {
      
            echo
                "<tr>"
                    . "<td> {$red['naziv_kategorije']} </td>"
                    . "<td> {$red['total']} </td>"
                    . "<td> <a href=\"ostalo/popis_videa.php?id={$red['id_kategorija']}\"><i class='fa fa-external-link' aria-hidden='true'></i></a></td>"
                    . "</tr>";
        
    }
}
$query2 = "Select * , kategorija.naziv_kategorije from projekt left join kategorija on projekt.id_kategorija=kategorija.id_kategorija";
$veza->spojiDB();
$result2 = $veza->selectDB($query2);
$veza->zatvoriDB();
function KreirajTablicu2($result2)
{
    while ($red = mysqli_fetch_array($result2)) {
        echo
            "<tr>"
                . "<td> {$red['naziv_projekta']} </td>"
                . "<td> {$red['akronim']} </td>"
                . "<td> {$red['naziv_kategorije']} </td>"
                . "<td>{$red['datum_pocetka']} </td>"
                . "<td>{$red['datum_zavrsetka']} </td>"
                . "<td>{$red['opis_zahtjeva']} </td>"
                . "<td>{$red['min_iznos_donacija']} </td>"
                . "<td>{$red['trenutni_iznos_donacija']} </td>"
                . "</tr>";
    }
}

UpravljajSesijom("log/trajanjesesije.conf", $putanja = getcwd());
$smarty = new Smarty();
$putanja = dirname($_SERVER["REQUEST_URI"]);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Kategorije");
$smarty->assign("description", "Kategorije");
$smarty->assign("keywords", "Kategorije");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik", $id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("result", $result);
$smarty->assign("result2", $result2);
$smarty->display("kategorije.tpl");
$smarty->display("uvijeti.tpl");
$smarty->assign("validacija", "kategorije.php");
$smarty->display("podnozje.tpl");
