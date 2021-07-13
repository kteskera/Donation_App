<?php
require "zaglavlje.php";
$style = array();
global $greske;
global $poruka;
global $provjera;
global $nesto;
global $nazivvidea;
global $vidljivost2;

if (isset($_GET['id'])) {

    $provjera = true;
    $nesto = "<label for='dodajvideo' style='display:block;'><b>Dodaj video</b></label>
    <input id='dodajvideo' type='file' name='dodajvideo'>";
    if (isset($_POST['submit'])) {
        if (empty($_POST['nazivvidea'])) {
            $greske .= 'Naziv videa je obavezan!' . "<br>";
            $style[0] = ' style=" border:1px solid red"';
        }
        $lokacija = "";
        if (isset($_FILES['dodajvideo'])) {
            $userfile = $_FILES['dodajvideo']['tmp_name'];
            $userfile_name = $_FILES['dodajvideo']['name'];
            $userfile_size = $_FILES['dodajvideo']['size'];
            $userfile_type = $_FILES['dodajvideo']['type'];
            $userfile_error = $_FILES['dodajvideo']['error'];
            if ($userfile_error > 0) {
                $greske .= 'Problem: ';
                switch ($userfile_error) {
                    case 1:
                        $greske .= 'Veličina veća od ' . ini_get('upload_max_filesize') . "<br>";
                        $style[1] = ' style=" border:1px solid red"';
                        break;
                    case 2:
                        $greske .= 'Veličina veća od ' . $_POST["MAX_FILE_SIZE"] . 'B!' . "<br>!";
                        $style[1] = ' style=" border:1px solid red"';
                        break;
                    case 3:
                        $greske .= 'Video je djelomičn prenesen!' . "<br>";
                        $style[1] = ' style=" border:1px solid red"';
                        break;
                    case 4:
                        $greske .= 'Video nije prenesen!' . "<br>";
                        $style[1] = ' style=" border:1px solid red"';
                        break;
                }
            }
            $upfile = 'uploads/' . $userfile_name;
            $lokacija = $upfile;
            if (is_uploaded_file($userfile)) {
                if (!move_uploaded_file($userfile, $upfile)) {
                    $greske .= 'Problem: nije moguće prenijeti sliku na odredište!' . "<br>";
                    $style[1] = ' style=" border:1px solid red"';
                }
            }
        }
        if (empty($greske)) {
            $id_zadatak = $_GET['id'];
            $naziv = $_POST['nazivvidea'];
            $vidljivost = $_POST['vidljivost'];
            $datum = IspisVirtualnogVremena($putanja = getcwd());
            $veza = new Baza();
            $veza->spojiDB();
            $query = "INSERT INTO `video`( `id_zadatak`, `naziv_videa`, `lokacija`, `vidljivost`) VALUES ('{$id_zadatak}','{$naziv}','{$lokacija}','{$vidljivost}')";
            $query2 = "UPDATE `zadatak` SET `datum_zavrsetka`='{$datum}' WHERE id_zadatak={$id_zadatak}";
            $rezultat = $veza->selectDB($query);
            $rezultat2 = $veza->selectDB($query2);
            $veza->zatvoriDB();
            dodaj_zapis($putanja = getcwd(), "Rad s bazom", $query, "");
            header("Location:profil.php");
        }
    }
}
UpravljajSesijom("log/trajanjesesije.conf",$putanja = getcwd());
if (isset($_GET['iduredi'])) {
    $provjera = false;
    $veza = new Baza();
    $veza->spojiDB();
    $upit = "SELECT * from video where id_zadatak='{$_GET['iduredi']}'";
    $rezultat = $veza->selectDB($upit);
    $veza->zatvoriDB();

    while ($red = mysqli_fetch_array($rezultat)) {
        if ($red) {
            $nazivvidea = $red['naziv_videa'];
            if ($red['vidljivost'] === '0' || empty($red['vidljivost'])) {
                $vidljivost2 = '0';
            } else if ($red['vidljivost'] === '1') {
                $vidljivost2 = '1';
            }
        }
    }
    if (isset($_POST['submit'])) {
        $veza = new Baza();
        $veza->spojiDB();
        $query = "update `video` set naziv_videa='{$_POST['nazivvidea']}',vidljivost='{$_POST['vidljivost']}' where id_zadatak='{$_GET['iduredi']}'";
        $rezultat = $veza->selectDB($query);
        $veza->zatvoriDB();
        dodaj_zapis($putanja = getcwd(), "Rad s bazom", $query, "");
        header("location: profil.php");
    }
}

if (isset($_SESSION['id_korisnik']) && $_SESSION['uloga'] <= '3') {
$smarty = new Smarty();
$putanja = dirname($_SERVER["REQUEST_URI"]);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "RjesiZad");
$smarty->assign("description", "RjesiZad");
$smarty->assign("keywords", "RjesiZad");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik", $id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("greske", $greske);
$smarty->assign("poruka", $poruka);
$smarty->assign("style", $style);
$smarty->assign("provjera", $provjera);
$smarty->assign("nesto", $nesto);
$smarty->assign("nazivvidea", $nazivvidea);
$smarty->assign("vidljivost2", $vidljivost2);
$smarty->display("rijesizadatak.tpl");
$smarty->assign("validacija", "kategorije.php");
$smarty->display("podnozje.tpl");
}else{
    header("Location:index.php");
}