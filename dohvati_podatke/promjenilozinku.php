<?php
require "../zaglavlje.php";
global $greske;
global $poruka;
$style = array();
if (isset($_POST['korisnickoime']) && isset($_POST['email'])) {
    foreach ($_POST as $k => $v) {
        if ($k === "korisnickoime" && empty($v)) {
            $greske .= "Polje: Korisničko ime ne smije ostati prazno!" . "<br>";
            $style[0] = 'style="border:1px solid red"';
        }
        if ($k === "email" && empty($v)) {
            $greske .= "Polje: Email ne smije ostati prazno!" . "<br>";
            $style[1] = 'style="border:1px solid red"';
        }
    }
    $korisnicko_ime = $_POST['korisnickoime'];
    $email = $_POST['email'];
    $query = "SELECT * from korisnik where korisnicko_ime='{$korisnicko_ime}' AND email='{$email}'";
    $veza = new Baza();
    $veza->spojiDB();
    $result = $veza->selectDB($query);
    $veza->zatvoriDB();
    while ($row = mysqli_fetch_array($result)) {
        $data["id_korisnik"] = $row["id_korisnik"];
        $data["korisnicko_ime"] = $row["korisnicko_ime"];
        $data["email"] = $row["email"];
        $data["lozinkash1"] = $row["lozinka_sh1"];
    }
    if (!empty($data["email"])) {
        $putanja = dirname($_SERVER['REQUEST_URI']);
        $actual_link = "http://$_SERVER[HTTP_HOST]" . $putanja . "/promjenilozinku.php?idpromjenalozinke=" . $data["id_korisnik"] . "&enc=" . $data["lozinkash1"];
        $toEmail = $data["email"];
        $subject = "Promjena lozinke";
        $content = "Kliknite ovjde ako želite promjeniti lozinku." . $actual_link;
        $mailHeaders = "From: Donacije\r\n";
        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            $poruka .= "Email poslan na vašu email adresu.";
        }
        unset($_POST);
    } else {
        $greske .= "Pogrešni podaci korisnika!" . "<br>";
    }
}

if (isset($_GET['idpromjenalozinke']) && isset($_GET['enc'])) {
    if (isset($_POST['submitlozinka'])) {
        foreach ($_POST as $k => $v) {
            if ($k === "Lozinka" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[0] = 'style="border:1px solid red"';
            } else if ($k === "Lozinka" && strlen($v) < 6) {
                $greske .= "Polje: Lozinka se mora sastojati od minimalno 6 znakova!" . "<br>";
                $style[0] = 'style="border:1px solid red"';
            }
            if ($k === "ponoviLozinku" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[1] = 'style="border:1px solid red"';
            } else if ($k === "ponoviLozinku" && strlen($v) < 6) {
                $greske .= "Polje: Lozinka se mora sastojati od minimalno 6 znakova!" . "<br>";
                $style[1] = 'style="border:1px solid red"';
            }
        }
        if ($_POST['Lozinka'] !== $_POST['ponoviLozinku']) {
            $greske .= "Lozinke se ne podudaraju!" . "<br>";
        }
        if (empty($greske)) {
            $lozinka = $_POST['Lozinka'];
            $salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN';
            $hash1 = sha1($lozinka);
            $hash1_sha1 = sha1($salt . $lozinka);
            $lozinkash1 = $hash1_sha1;
            $veza = new Baza();
            $veza->spojiDB();
            $upit = "UPDATE `korisnik` SET `lozinka`='{$lozinka}',`lozinka_sh1`='{$lozinkash1}' WHERE `id_korisnik`='{$_GET['idpromjenalozinke']}'";
            $veza->selectDB($upit);
            $veza->zatvoriDB();
            header("Location: ../obrasci/prijava.php");
        }
    }
}
$smarty = new Smarty();
$smarty->setTemplateDir("../templates")
    ->setCompileDir("../templates_c")
    ->setConfigDir("../configs")
    ->setCacheDir("../cache");
$putanja = dirname($_SERVER["REQUEST_URI"], 2);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Promjeni lozinku");
$smarty->assign("description", "Promjeni lozinku");
$smarty->assign("keywords", "Promjeni lozinku");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik", $id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("greske", $greske);
$smarty->assign("poruka", $poruka);
$smarty->assign("style", $style);
if (isset($_GET['idpromjenalozinke']) && isset($_GET['enc'])) {
    $smarty->display("lozinka.tpl");
} else {
    $smarty->display("promjenilozinku.tpl");
}
$smarty->display("uvijeti.tpl");
$smarty->assign("validacija", "promjenulozinku.php");
$smarty->display("podnozje.tpl");
