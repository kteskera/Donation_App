<?php
require "../vanjske_biblioteke/baza.class.php";
$id_kategorija = $_GET['id_kategorija'];
$query = "select * from projekt where id_kategorija={$id_kategorija} AND datum_zavrsetka>=NOW()";
$veza = new Baza();
$veza->spojiDB();
$result = $veza->selectDB($query);
$veza->zatvoriDB();
$i=0;
while ($row = mysqli_fetch_array($result)) {
    $data[$i]["id_projekt"] = $row["id_projekt"];
    $data[$i]["naziv_projekta"] = $row["naziv_projekta"];
    $data[$i]["akronim"] = $row["akronim"];
    $data[$i]["datum_pocetka"] = $row["datum_pocetka"];
    $data[$i]["datum_zavrsetka"] = $row["datum_zavrsetka"];
    $data[$i]["opis_zahtjeva"] = $row["opis_zahtjeva"];
    $data[$i]["min_iznos_donacija"] = $row["min_iznos_donacija"];
    $data[$i]["trenutni_iznos_donacija"] = $row["trenutni_iznos_donacija"];
    $i++;
}
echo json_encode($data);


