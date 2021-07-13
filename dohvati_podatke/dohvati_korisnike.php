<?php
require "../vanjske_biblioteke/baza.class.php";
$id_kompetencije = $_GET['id_kompetencije'];
$query = "select korisnik.id_korisnik,korisnik.ime, korisnik.prezime, korisnik.korisnicko_ime from korisnik,odabir_kompetencije where  korisnik.id_korisnik=odabir_kompetencije.id_korisnik AND odabir_kompetencije.id_kompetencije={$id_kompetencije}";
$veza = new Baza();
$veza->spojiDB();
$result = $veza->selectDB($query);
$veza->zatvoriDB();
$i=0;
while ($row = mysqli_fetch_array($result)) {
    $data[$i]["id_korisnik"] = $row["id_korisnik"];
    $data[$i]["ime"] = $row["ime"];
    $data[$i]["prezime"] = $row["prezime"];
    $data[$i]["korisnicko_ime"] = $row["korisnicko_ime"];
    $i++;
}
echo json_encode($data);
