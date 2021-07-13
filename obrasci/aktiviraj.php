<?php
require "../zaglavlje.php";
if (!empty($_GET["id"])) {
    $veza = new Baza();
    $veza->spojiDB();
    $query = "SELECT * FROM `korisnik` WHERE `id_korisnik`='" . $_GET["id"] . "'";
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    $datum = IspisVirtualnogVremena2($putanja = dirname(getcwd()));
    $datumisteka = date("Y-m-d H:i:s", $datum + (7 * 60 * 60));
    $hours="";
    while ($red = mysqli_fetch_array($result)) {
        $seconds = strtotime($datumisteka) - strtotime($red['datum_registracije']);
        $days    = floor($seconds / 86400);
        $hours   = floor(($seconds - ($days * 86400)) / 3600);
    }
    if ($hours <= 7) {
        $veza = new Baza();
        $veza->spojiDB();
        $query = "UPDATE korisnik set potvrda_racuna = '1' WHERE id_korisnik='" . $_GET["id"] . "'";
        $result = $veza->selectDB($query);
        $veza->zatvoriDB();
        echo "Uspješna aktivacija";
    } else {
        echo "Aktivacijski link je istekao.";
    }
}
