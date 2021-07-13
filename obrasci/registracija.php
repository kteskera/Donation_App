<?php
require "../zaglavlje.php";
$greske = "";
$poruka = "";
$style = array();
global $ime;
global $prezime;
global $korsime;
global $uvjeti;
global $email;
global $zakljucaj;
global $lozinka;
$akcija = "Registracija";

if (isset($_GET['idhid'])) {
    $akcija = "Ažuriraj podatke";
    $var = $_GET['idhid'];
    $veza = new Baza();
    $veza->spojiDB();
    $upit = "SELECT * from korisnik where id_korisnik={$var}";
    $rezultat = $veza->selectDB($upit);
    $veza->zatvoriDB();
    while ($red = mysqli_fetch_array($rezultat)) {
        if (isset($red['uvjeti']) && !(empty($red['uvjeti']))) {
            $uvjeti="checked";
        }
          if ($red) {
            $ime = $red['ime'];
            $prezime =  $red['prezime'];
            $korsime =  $red['korisnicko_ime'];
            $email =  $red['email'];   
            $lozinka =  $red['lozinka'];
            $zakljucaj = "readonly";
        }
    }
    if (isset($_POST['submit'])) {
        foreach ($_POST as $k => $v) {
            if ($k === "Ime" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[0] = 'style="border:1px solid red"';
            }
            if ($k === "Prezime" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[1] = 'style="border:1px solid red"';
            }
            if ($k === "KorisnickoIme" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[2] = 'style="border:1px solid red"';
            }
            if ($k === "email" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[3] = 'style="border:1px solid red"';
            }
            if ($k === "Lozinka" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[4] = 'style="border:1px solid red"';
            }
            if ($k === "ponoviLozinku" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[6] = 'style="border:1px solid red"';
            }
        }
        if ($_POST['Lozinka'] !== $_POST['ponoviLozinku']) {
            $greske .= "Lozinke se ne podudaraju!" . "<br>";
            $style[4] = 'style="border:1px solid red"';
            $style[6] = 'style="border:1px solid red"';
        }
        if (empty($greske)) {
            if (isset($_POST['uvjeti'])){
                $uvjetivirt = IspisVirtualnogVremena($putanja = dirname(getcwd()));
                $pokusaj=",`uvjeti`='{$uvjetivirt}'";
            }else{
                $uvjetivirt=null;
                $pokusaj=",`uvjeti`=NULL";
            }
            $veza = new Baza();
            $veza->spojiDB();
            $id = $_GET['idhid'];
            $ime = $_POST['Ime'];
            $prezime = $_POST['Prezime'];
            $korime = $_POST['KorisnickoIme'];
            $email = $_POST['email'];
            $lozinka = $_POST['Lozinka'];
            $salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN';
            $hash1 = sha1($lozinka);
            $hash1_sha1 = sha1($salt . $lozinka);
            $ponoviLozinku = $hash1_sha1;
            
            $upit = "UPDATE `korisnik` SET `ime`='{$ime}',`prezime`='{$prezime}',`korisnicko_ime`='{$korime}',`email`='{$email}',`lozinka`='{$lozinka}',`lozinka_sh1`='{$ponoviLozinku}' ".$pokusaj." WHERE `id_korisnik`= '{$id}'";
            $rezultat = $veza->selectDB($upit);
            $veza->zatvoriDB();
            $poruka = "Uspješno ažuriranje korisnika!";
            header("Location: ../profil.php");
            dodaj_zapis($putanja = dirname(getcwd()), "Rad s bazom", $upit,"");
        }
    }
}

$match = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
if (!isset($_GET['idhid'])) {
    if (isset($_POST['submit'])) {
        foreach ($_POST as $k => $v) {
            if ($k === "Ime" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[0] = 'style="border:1px solid red"';
            } else if ($k === "Ime" && strlen($v) < 2) {
                $greske .= "Polje: " . $k . " ne može imati samo jedno slovo!" . "<br>";
                $style[0] = 'style="border:1px solid red"';
            }
            if ($k === "Prezime" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[1] = 'style="border:1px solid red"';
            } else if ($k === "Prezime" && strlen($v) < 2) {
                $greske .= "Polje: " . $k . " ne može imati samo jedno slovo!" . "<br>";
                $style[1] = 'style="border:1px solid red"';
            }
            if ($k === "KorisnickoIme" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[2] = 'style="border:1px solid red"';
            } else if ($k === "KorisnickoIme" && strlen($v) < 5) {
                $greske .= "Polje: " . $k . " se može sastojati od minimalno 5 slova!" . "<br>";
                $style[2] = 'style="border:1px solid red"';
            }
            if ($k === "email" && empty($v)) {
                $greske .= "Polje: Email ne smije ostati prazno!" . "<br>";
                $style[3] = 'style="border:1px solid red"';
            } else if ($k === "email" && !preg_match($match, $v)) {
                $greske .= "Polje: Email-> krivi format!" . "<br>";
                $style[3] = 'style="border:1px solid red"';
            }
            if ($k === "Lozinka" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[4] = 'style="border:1px solid red"';
            } else if ($k === "Lozinka" && strlen($v) < 6) {
                $greske .= "Polje: " . $k . " se mora sastojati od minimalno 6 znakova!" . "<br>";
                $style[4] = 'style="border:1px solid red"';
            }
            if ($k === "ponoviLozinku" && empty($v)) {
                $greske .= "Polje: " . $k . " ne smije ostati prazno!" . "<br>";
                $style[6] = 'style="border:1px solid red"';
            } else if ($k === "Lozinka" && strlen($v) < 6) {
                $greske .= "Polje: " . $k . " se mora sastojati od minimalno 6 znakova!" . "<br>";
                $style[6] = 'style="border:1px solid red"';
            }
        }
        if ($_POST['Lozinka'] !== $_POST['ponoviLozinku']) {
            $greske .= "Lozinke se ne podudaraju!" . "<br>";
            $style[4] = 'style="border:1px solid red"';
            $style[6] = 'style="border:1px solid red"';
        }
        if (isset($_POST['g-recaptcha-response'])) {
            if (!empty($_POST['g-recaptcha-response'])) {
                $secret_key = "6LdY96IZAAAAANUUngju8ySFSWnRweeX01V40faS";
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response=" . $_POST['g-recaptcha-response']);
                $response_data = json_decode($response, false);
                if (!$response_data->success) {
                    $greske .= "Captcha je neuspješno verificirana!" . "<br>";
                }
            } else {
                $greske .= "Captcha je obavezna!" . "<br>";
            }
        }
        if (empty($greske)) {
            $veza = new Baza();
            $veza->spojiDB();
            $ime = $_POST['Ime'];
            $prezime = $_POST['Prezime'];
            $korime = $_POST['KorisnickoIme'];
            $email = $_POST['email'];
            $lozinka = $_POST['Lozinka'];
            $salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN';
            $hash1 = sha1($lozinka);
            $hash1_sha1 = sha1($salt . $lozinka);
            $ponoviLozinku = $hash1_sha1;
            $datum = IspisVirtualnogVremena($putanja = dirname(getcwd()));
            if (isset($_POST['uvjeti']) && !empty($_POST['uvjeti'])){
                $datumuvjeta = IspisVirtualnogVremena($putanja = dirname(getcwd()));
            } else {
                $datumuvjeta = NULL;
            }
            $query = "SELECT * from korisnik where korisnicko_ime='{$korime}' AND email='{$email}' ";
            $result = $veza->selectDB($query);
            while ($row = mysqli_fetch_array($result)) {
                $data["korisnickoime"] = $row["korisnicko_ime"];
                $data["email"] = $row["email"];
            }
            if (isset($data)) {
                if ($data["korisnickoime"] === $korime) {
                    $greske .= "Korisničko ime je zauzeto!" . "<br>";
                    $style[2] = 'style="border:1px solid red"';
                }
                if ($data["email"] === $email) {
                    $greske .= "Email je zauzet!" . "<br>";
                    $style[3] = 'style="border:1px solid red"';
                }
            } else if (empty($greske)) {
                $upit = "INSERT INTO `korisnik`( `ime`, `prezime`, `korisnicko_ime`, `datum_registracije`, `email`, `lozinka`, `lozinka_sh1`, `uloga_id_uloga`,`uvjeti`) VALUES ( '{$ime}','{$prezime}','{$korime}','{$datum}','{$email}','{$lozinka}','{$ponoviLozinku}','3','{$datumuvjeta}')";
                $current_id = $veza->insertQuery($upit);
                $veza->zatvoriDB();
                if (!empty($current_id)) {
                    $putanja = dirname($_SERVER['REQUEST_URI']);
                    $actual_link = "http://$_SERVER[HTTP_HOST]" . $putanja . "/aktiviraj.php?id=" . $current_id;
                    $toEmail = $email;
                    $subject = "Aktivacija korisničkog računa";
                    $content = "Kliknite ovjde ako želite aktivirati korisnički račun." . $actual_link;
                    $mailHeaders = "From: Donacije\r\n";
                    if (mail($toEmail, $subject, $content, $mailHeaders)) {
                        $poruka .= "Aktivacijski email je poslan na vašu email adresu";
                        $veza = new Baza();
                        $veza->spojiDB();
                        $upit = "UPDATE  `korisnik` set aktivacijski_token={$actual_link} WHERE id_korisnik={$current_id}";
                        $veza->selectDB($upit);
                        $veza->zatvoriDB();
                    }
                    unset($_POST);
                } else {
                    $greske .= "Problem u registraciji. Pokušajte ponovno!" . "<br>";
                }
                $poruka = "Uspješno dodavanje korisnika!";
                header( "refresh:5;url=prijava.php" );
                dodaj_zapis($putanja = dirname(getcwd()), "Rad s bazom", $upit,"");
            }
        }
    }
}
UpravljajSesijom("../log/trajanjesesije.conf",$putanja = dirname(getcwd()));
$smarty = new Smarty();
$smarty->setTemplateDir("../templates")
    ->setCompileDir("../templates_c")
    ->setConfigDir("../configs")
    ->setCacheDir("../cache");
$putanja = dirname($_SERVER["REQUEST_URI"], 2);
$smarty->assign("putanja", $putanja);
$smarty->assign("title", "Registracija");
$smarty->assign("description", "Registracija korisnika. 29.3.2020.");
$smarty->assign("keywords", "Podaci, Email, Lozinka");
$smarty->assign("status", $status);
$smarty->assign("korime", $korime);
$smarty->assign("id_korisnik", $id_korisnik);
$smarty->display("zaglavlje.tpl");
$smarty->assign("poruka", $poruka);
$smarty->assign("greske", $greske);
$smarty->assign("style", $style);
$smarty->assign("ime", $ime);
$smarty->assign("prezime", $prezime);
$smarty->assign("korsime", $korsime);
$smarty->assign("email", $email);
$smarty->assign("zakljucaj", $zakljucaj);
$smarty->assign("lozinka", $lozinka);
$smarty->assign("uvjeti", $uvjeti);
$smarty->assign("akcija", $akcija);
$smarty->display("registracija.tpl");
$smarty->display("uvijeti.tpl");
$smarty->assign("validacija", "obrasci/registracija.php");
$smarty->display("podnozje.tpl");
