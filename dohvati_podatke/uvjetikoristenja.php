<?php
require "../zaglavlje.php";
if(isset($_SESSION['id_korisnik'])){
    $id_korisnik = $_SESSION['id_korisnik'];
    $query = "select * from korisnik where id_korisnik={$id_korisnik}";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($row = mysqli_fetch_array($result)) {
        $data["uvjeti"] = $row["uvjeti"];
    }
}
if(!empty($data["uvjeti"])){
    echo json_encode($data);
}