<?php
require "../vanjske_biblioteke/baza.class.php";
$datum_pocetka = $_GET['datum_pocetka'];
$datum_zavrsetka = $_GET['datum_zavrsetka'];
$query = "SELECT *  from projekt left join kategorija on projekt.id_kategorija=kategorija.id_kategorija where projekt.datum_pocetka>='{$datum_pocetka}' AND projekt.datum_zavrsetka<='{$datum_zavrsetka}'";
$veza = new Baza();
$veza->spojiDB();
$result = $veza->selectDB($query);
$veza->zatvoriDB();
$i = 0;
while ($row = mysqli_fetch_array($result)) {
    $data[$i]["id_projekt"] = $row["id_projekt"];
    $data[$i]["naziv_projekta"] = $row["naziv_projekta"];
    $data[$i]["naziv_kategorije"] = $row['naziv_kategorije'];
    $data[$i]["akronim"] = $row["akronim"];
    $data[$i]["datum_pocetka"] = $row["datum_pocetka"];
    $data[$i]["datum_zavrsetka"] = $row["datum_zavrsetka"];
    $data[$i]["opis_zahtjeva"] = $row["opis_zahtjeva"];
    $data[$i]["min_iznos_donacija"] = $row["min_iznos_donacija"];
    $data[$i]["trenutni_iznos_donacija"] = $row["trenutni_iznos_donacija"];
    $i++;
}
echo json_encode($data);
