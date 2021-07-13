<?php
require "../vanjske_biblioteke/baza.class.php";
if (isset($_GET['id_projekt']) && !isset($_GET['datum_pocetka']) && !isset($_GET['datum_zavrsetka'])) {
    $id_projekt = $_GET['id_projekt'];
    $query = "select *,korisnik.ime, korisnik.prezime from zadatak left join korisnik on zadatak.id_korisnik=korisnik.id_korisnik where zadatak.id_projekt={$id_projekt} ";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $data[$i]["id_zadatak"] = $row["id_zadatak"];
        $data[$i]["id_projekt"] = $row["id_projekt"];
        $data[$i]["id_korisnik"] = $row["id_korisnik"];
        $data[$i]["opis"] = $row["opis"];
        $data[$i]["datum_pocetka"] = $row["datum_pocetka"];
        $data[$i]["datum_zavrsetka"] = $row["datum_zavrsetka"];
        $data[$i]["ime"] = $row["ime"];
        $data[$i]["prezime"] = $row["prezime"];
        $i++;
    }
    echo json_encode($data);
} else if (isset($_GET['id_projekt']) && isset($_GET['datum_pocetka']) && isset($_GET['datum_zavrsetka'])) {
    $id_projekt = $_GET['id_projekt'];
    $datum_pocetka = $_GET['datum_pocetka'];
    $datum_zavrsetka = $_GET['datum_zavrsetka'];
    $query = "select *,korisnik.ime, korisnik.prezime from zadatak left join korisnik on zadatak.id_korisnik=korisnik.id_korisnik where zadatak.id_projekt={$id_projekt} AND zadatak.datum_pocetka>='{$datum_pocetka}' AND zadatak.datum_zavrsetka<='{$datum_zavrsetka}' ";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $data[$i]["id_zadatak"] = $row["id_zadatak"];
        $data[$i]["id_projekt"] = $row["id_projekt"];
        $data[$i]["id_korisnik"] = $row["id_korisnik"];
        $data[$i]["opis"] = $row["opis"];
        $data[$i]["datum_pocetka"] = $row["datum_pocetka"];
        $data[$i]["datum_zavrsetka"] = $row["datum_zavrsetka"];
        $data[$i]["ime"] = $row["ime"];
        $data[$i]["prezime"] = $row["prezime"];
        $i++;
    }
    echo json_encode($data);
}
