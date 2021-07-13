<?php
require "../vanjske_biblioteke/baza.class.php";
    $email = $_GET['email'];
    $query = "select count(*) as cntUser from korisnik where email='".$email."' ";
    $veza= new Baza();
    $veza->spojiDB();
    $result =$veza->selectDB($query);
    $veza->zatvoriDB();
    if(mysqli_num_rows($result)){
       $row = mysqli_fetch_array($result);
       $count = $row['cntUser'];
       if($count > 0){
           $response = "<email>{$email}</email>";
           echo $response;
       }
    else{
        $response =null;
        echo $response;
    }
}
    die;
?>
