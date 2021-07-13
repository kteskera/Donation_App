<?php
require "../zaglavlje.php";
if (isset($_GET['selkorisnici'])) {
    $query = "UPDATE korisnik set uloga_id_uloga='1' where id_korisnik='{$_GET['selkorisnici']}'";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    header("Location: ../postavke/postavke.php");
}
