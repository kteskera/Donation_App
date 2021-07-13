<?php
require "zaglavlje.php";
UpravljajSesijom("log/trajanjesesije.conf",$putanja = getcwd());
if (isset($_GET['id'])) {
    $query = "UPDATE zahtjev_za_sudjelovanje SET potvrda='1' WHERE id_zahtjev_za_sujedjelovanje={$_GET['id']}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    header("Location:profil.php");
    dodaj_zapis($putanja=getcwd(),"Rad s bazom",$query,"");
}
