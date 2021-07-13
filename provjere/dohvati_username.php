<?php
require "../vanjske_biblioteke/baza.class.php";
    $KorisnickoIme = $_GET['KorisnickoIme'];
    $query = "select count(*) as cntUser from korisnik where korisnicko_ime='".$KorisnickoIme."'";
    $veza= new Baza();
    $veza->spojiDB();
    $result =$veza->selectDB($query);
    $veza->zatvoriDB();
    if(mysqli_num_rows($result)){
       $row = mysqli_fetch_array($result);
       $count = $row['cntUser'];
       if($count > 0){
           $response = array('KorisnickoIme' => $KorisnickoIme);
           echo json_encode($response);
       }
    else{
        $response =null;
        echo json_encode($response);
    }
}
    die;
?>
