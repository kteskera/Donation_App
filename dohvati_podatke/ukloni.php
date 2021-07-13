<?php
require "../zaglavlje.php";
if (isset($_GET['id'])) {
    $query = "DELETE from odabir_kompetencije where id_odabir_kompetencije={$_GET['id']}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    header("Location:../profil.php");
} else if (isset($_GET['idblok'])) {
    $query = "UPDATE korisnik set blokiran_racun=1 where id_korisnik={$_GET['idblok']}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    header("Location:../postavke/postavke.php");
} else if (isset($_GET['iddeblok'])) {
    $query = "UPDATE korisnik set blokiran_racun=0 where id_korisnik={$_GET['iddeblok']}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    header("Location:../postavke/postavke.php");
} else if (isset($_GET['idkom'])) {
    $query = "DELETE from kompetencije where id_kompetencije={$_GET['idkom']}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    header("Location:../postavke/postavke.php");
} else if (isset($_GET['idrest'])) {
    $query = "UPDATE korisnik set uvjeti=NULL where id_korisnik={$_GET['idrest']}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    header("Location:../postavke/postavke.php");
}
