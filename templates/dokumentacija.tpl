<div class="gridMain">
    <h2 style="font-size: 35px;color :rgb(76, 152, 175); margin-left: 20px;">Dokumentacija</h2>
    <hr class="new">
    <div class="rowClanakPocetna">
        <div class="columnClanakPocetna">

            <h2 class="naslovClanakPocetna">Opis projektnog zadatka</h2>

            <p class="velicinaParagrafa"> Projektni zadatak bio je implementirati sustav za prikupljanje sredstva za projekte i upravljanje projektnim timom.
                U sustavu postoje 4 uloge, a to su neregistrirani korisnik, registrirani korisnik ili suradnik, moderator ili voditelj projekta te administrator.
                Administrator upravlja cijelim servisom. Ima pristup svim stranicama, te dodatno kreira kompetencije, kategorije, postavke sustava i slično.
                Moderator može kreirati projekte ukoliko ga administrator postavi da može raditi u određenoj kategoriji, slati zahtjeve za sudjelovanje na projektu, te kreirati radne zadatke
                za suradnike na projektima. Suradnik se postane registracijom na servis, te kad se prihvati zahtjev za sudjelovanje. Suradnik rješava radni zadatak kada postavi
                video sa zadanom temom na servis. Suradnik ujedno može i donirati sredstva za određeni projekt ukoliko se skupljaju donacije.
                Neregistrirani korisnik ima pravo pristupa samo početnoj stranici, dokumentaciji, o autoru te popis kategorija i projekata.
            </p>
        </div>

        <div class="columnClanakPocetna">

            <h2 class="naslovClanakPocetna">Opis projektnog riješenja</h2>

            <p>
                Sustav je implementiran po navedenim uputama. Dizajn sustava je minimalistički. Cijeli projekt izrađen je bez korištenja framweorka.
                Za dizajn sučelja korišteni su HTML,CSS te večina podataka dohvaćala putem jQuery Ajax poziva. Korišten je objektno-orijentiran princip implementacije, a to su
                Smarty predlošci te je implementiran u cijelom projektu.
                Na poslužiteljskoj strani korišten je PHP koji upravlja bazom podataka. PHP skripte slale podatke u json formatu pomoću ajax poziva.
                Sa korisničke strane, sve je osigurano JavaScriptom
            </p>
        </div>
    </div>
    <hr class="new">
    <div style="text-align: center;">
        <h2 style="font-size: 30px; color:rgb(99, 99, 99); text-align: left; margin-left: 20px;">ERA model</h2>
        <a href="multimedija/era.png" target="_blank"><img title="ERA" style="height:400px; width: 800px;" src="multimedija/era.png" alt="eradijagram"></a>
    </div>
    <hr class="new">
    <h2 style="font-size: 30px; color:rgb(99, 99, 99); margin-left: 20px;">Popis i opis skripata</h2>
    <div style="text-align: center; ">
        <table id="tablicaskripata" class="display" style="width: 80%;">
            <thead>
                <tr>
                    <th class="stil">Naziv skripte</th>
                    <th class="stil">opis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>zaglavlje.php</td>
                    <td>skripta koja ima uključene sve vanjske biblioteke, skripta koja ima implementirane</td>
                </tr>
                <tr>
                    <td>autor.php</td>
                    <td>prikazuje stranicu O autoru</td>
                </tr>
                <tr>
                    <td>dokumentacija.php</td>
                    <td>skripta koja prikazuje ovu projektnu dokumentaciju</td>
                </tr>
                <tr>
                    <td>index.php</td>
                    <td>skripta koja prikazuje početnu stranicu</td>
                </tr>
                <tr>
                    <td>kategorije.php</td>
                    <td>skripta koja prikazuje javno sve kategorije i projekte za koje se skupljaju donacije</td>
                </tr>
                <tr>
                    <td>prihvati.php</td>
                    <td>skripta koja potvrđuje suradnikov zahtjev za sudjelovanje na projektu</td>
                </tr>
                <tr>
                    <td>profil.php</td>
                    <td>skripta koja prikazuje popis zadataka, popis kompetencija i popis dodjeljenjih radnih zadataka</td>
                </tr>
                <tr>
                    <td>rijesizadatak.php</td>
                    <td>skripta koja omogućuje rješavanje dodjeljenog radnog zadatka gdje suradnik postavi video na sustav</td>
                </tr>
                <tr>
                    <td>postavke.php</td>
                    <td>skripta koja omogućuje administratoru konfiguraciju web stranice, može blokirati korisnike, uređivati kompetencije</td>
                </tr>
                <tr>
                    <td>popis_videa.php</td>
                    <td>skripta koja prikazuje sve videe za pojedinu kategoriju projekta</td>
                </tr>
                <tr>
                    <td>dodajmoderatora.php</td>
                    <td>skripta koja omogućuje administratoru dodati moderatora za određenu kategoriju</td>
                </tr>
                <tr>
                    <td>donacija.php</td>
                    <td>skripta koja prikazuje sve projekte za koje se skupljaju donacije</td>
                </tr>
                <tr>
                    <td>doniraj.php</td>
                    <td>skripta koja omogućuje donirati sredstva za određeni projekt</td>
                </tr>
                <tr>
                    <td>korisnici.php</td>
                    <td>skripta koja prikazuje sve registrirane korisnike grupirane po kompetencijama</td>
                </tr>
                <tr>
                    <td>obrisi.php</td>
                    <td>skripta koja omogućuje brisanje podataka za određenu tablicu u bazi podataka</td>
                </tr>
                <tr>
                    <td>popiskategorija.php</td>
                    <td>skripta kojoj samo administrator ima pristup, omogućuje uređivanje kategorija, dodavanje novih kategorija, dodavanje moderatora, brisanje moderatora</td>
                </tr>
                <tr>
                    <td>popisprojekata.php</td>
                    <td>skripta koja je vidljiva administratoru i moderatoru, omogućuje dodavanje ili uređivanje projekata</td>
                </tr>
                <tr>
                    <td>projekt.php</td>
                    <td>skripta koja prikazuje formu za kreiranje ili uređivanje projekata</td>
                </tr>
                <tr>
                    <td>zadaci.php</td>
                    <td>skripta koja omogućuje prikaz zadataka, dodavanje zadataka ili uređivanje nekog postojećeg zadatka</td>
                </tr>
                <tr>
                    <td>zadatak.php</td>
                    <td>skripta koja prikazuje formu za kreiranje ili uređivanje zadataka</td>
                </tr>
                <tr>
                    <td>zahtjevzasudjelovanje.php</td>
                    <td>skripta koja prikzuje formu za zahtjev za sudjelovanje na projektu</td>
                </tr>
                <tr>
                    <td>aktivni_projekti.php</td>
                    <td>skripta koja dohvaća podatke iz baze podataka pomoću proslijeđenih parametara putem ajax poziva, prikazuje aktivne projekte</td>
                </tr>
                <tr>
                    <td>dodajadmina.php</td>
                    <td>skripta koja omogućuje dodjelu uloge administratora</td>
                </tr>
                <tr>
                    <td>dohvati.php</td>
                    <td>skripta koja dohvaća podatke iz baze podataka pomoću proslijeđenih parametara putem ajax poziva za filtriranje podataka</td>
                </tr>
                <tr>
                    <td>dohvati_korisnike.php</td>
                    <td>skripta koja dohvaća podatke iz baze podataka pomoću proslijeđenih parametara putem ajax poziva, dohvaća korisnike preko kompetencija</td>
                </tr>
                <tr>
                    <td>dohvati_projekte.php</td>
                    <td>skripta koja dohvaća podatke iz baze podataka pomoću proslijeđenih parametara putem ajax poziva, dohvaća projekte preko id kategorija</td>
                </tr>
                <tr>
                    <td>dohvatizadatke.php</td>
                    <td>skripta koja dohvaća podatke iz baze podataka pomoću proslijeđenih parametara putem ajax poziva, dohvaća zadatke filtrirane po datumu ili po proslijeđenom id-u porjekta</td>
                </tr>
                <tr>
                    <td>promjenilozinku.php</td>
                    <td>skripta koja omogućuje korisniku promjenu lozinke nakon što mu je link poslan na email adresu</td>
                </tr>
                <tr>
                    <td>ukloni.php</td>
                    <td>skripta koja omogućuje ažuriranje podataka ili brisanje podataka iz baze</td>
                </tr>
                <tr>
                    <td>uvjetikoristenja.php</td>
                    <td>skripta koja dohvaća podatke iz baze podataka pomoću proslijeđenih parametara putem ajax poziva, provjerava da li korisnik ima prihvaćene uvjete korištenja</td>
                </tr>
                <tr>
                    <td>dohvati_username.php</td>
                    <td>skripta koja dohvaća podatke iz baze podataka pomoću proslijeđenih parametara putem ajax poziva, provjerava postoji li već takav username u bazi, ako postoji zabranjuje kreiranje korisnika</td>
                </tr>
                <tr>
                    <td>dohvati_email.php</td>
                    <td>skripta koja dohvaća podatke iz baze podataka pomoću proslijeđenih parametara putem ajax poziva, provjerava postoji li već takav email u bazi, ako postoji zabranjuje kreiranje korisnika </td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr class="new">
    <h2 style="font-size: 30px; color:rgb(99, 99, 99); margin-left: 20px;">Navigacijski dijagrami</h2>

    <div class="rowClanakPocetna">
        <div class="columnClanakPocetna">

            <h2 class="naslovClanakPocetna">Administrator</h2>
            <a href="multimedija/Administrator.png" target="_blank"><img title="administrator" style="height:300px; width:500px; border: 1px solid rgb(211, 208, 208);" src="multimedija/Administrator.png" alt="administrator"></a>
        </div>

        <div class="columnClanakPocetna">

            <h2 class="naslovClanakPocetna">Moderator</h2>

            <a href="multimedija/Moderator.png" target="_blank"><img title="Moderator" style="height:300px; width:500px;border: 1px solid rgb(211, 208, 208);" src="multimedija/Moderator.png" alt="moderator"></a>

        </div>
    </div>
    <div class="rowClanakPocetna">
        <div class="columnClanakPocetna">


            <h2 class="naslovClanakPocetna">Suradnik/registrirani korisnik</h2>
            <a href="multimedija/suradnik.png" target="_blank"><img title="suradnik" style="height:300px; width:500px;border: 1px solid rgb(211, 208, 208);" src="multimedija/suradnik.png" alt="suradnik"></a>
        </div>

        <div class="columnClanakPocetna">

            <h2 class="naslovClanakPocetna">Neregistrirani korisnik</h2>

            <a href="multimedija/neregistrirani.png" target="_blank"><img title="neregistrirani" style="height:300px; width:500px;border: 1px solid rgb(211, 208, 208);" src="multimedija/neregistrirani.png" alt="neregistrirani"></a>

        </div>
    </div>
    <hr class="new">
    <div class="rowClanakPocetna">
        <div class="columnClanakPocetna">

            <h2 class="naslovClanakPocetna">Mape mjesta</h2>

            <p>
                Javni portal:<br>
                <a href="index.php">Početna</a><br>
                <a href="autor.php">O autoru</a><br>
                <a href="dokumentacija.php">Dokumentacija</a><br>
                <a href="kategorije.php">Donacije</i></a><br>
                <a href="obrasci/registracija.php">Registracija</a><br>
                <a href="obrasci/prijava.php">Prijava</a><br>
                <a href="dohvati_podatke/promjenilozinku.php">Zaboravljena lozinka</a><br>
                Korisnički portal registriranih korisnika:<br>
                <a href="kategorije/donacija.php">Doniraj sredstva</a><br>
                <a href="profil.php">Profil </a><br>
                Korisnički portal za moderatore:<br>
                <a href="kategorije/popisprojekata.php">Projekti</a><br>
                <a href="kategorije/zadaci.php">Zadaci</a><br>
                <a href="kategorije/korisnici.php"> Korisnici</a><br>
                Korisnički portal za administratore:<br>
                <a href="postavke/postavke.php">Postavke</a><br>
                <a href="kategorije/popiskategorija.php">Upravljaj kategorijama</a><br>
            </p>
        </div>
        <div class="columnClanakPocetna">

            <h2 class="naslovClanakPocetna">Popis i opis vanjskih tuđih modula/biblioteka</h2>

            <p class="proba"> <span style="color:rgb(50, 154, 185) ;">Klase: </span><br>
                Smarty-3.1.34 - korišteno u cijelom projektu<br>
                baza.class.php - klasa preuzeta od nastavnika i korištena je u cijelom projektu<br>
                sesija.class.php - klasa preuzeta od nastavnika i korištena je u cijelom projektu<br>
                <span style="color:rgb(50, 154, 185) ;">Biblioteke:</span> <br>
                cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css - korištena u cijelom projektu za ikone gumbova
                <br>
                cdn.datatables.net/1.10.20/css/jquery.dataTables.css" - css stylesheet za DataTable tablice - ali je css pregažen vlastitim css-om
                <br>
                cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" - css stylesheet za DataTable tablice - ali je css pregažen vlastitim css-om
                <br>
                cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css -css stylesheet za DataTable gumbe - ali je css pregažen vlastitim css-om
                <br>
                code.jquery.com/jquery-3.5.1.js - korištena u cijelom projektu kako bi omogućila rad s jQuery-ijem<br>
                cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js - omogućuje uporabu DataTable, korištena je u jQuery-iju
                <br>
                cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js - omogućuje dodavanje gumbova za DataTable tablice<br>
                cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js - omogućuje dodavanje funkcionalnosti ispisa za DataTable tablice<br>
                www.google.com/recaptcha/api.js - omogućuje funkcionalnost captcha prilikom registracije<br>
                www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" - kad se captcha popuni provjerava točnost iste<br>
            </p>
        </div>


    </div>
    <hr class="new">
    <div class="rowClanakPocetna">
        <div class="columnClanakPocetna">

            <h2 class="naslovClanakPocetna">Popis korištenih tegnologija i alata</h2>

            <p class="velicinaParagrafa">
                Microsoft Visual Studio Code - u njemu je pisan cijeli kod projekta<br>
                Xampp Control panel - pokreće server na kojem se projekt nalazi<br>
                MySQL Workbench - u njoj je kreirana baza podataka <br>
                PhpMyAdmin - ovdje je uvezena sql skripta koja je kreirala bazu podataka na servisu<br>
                The W3C CSS Validation Service - provjera css-a<br>
                The W3C HTML Validation Service - provjera html-a<br>

            </p>
        </div>
    </div>
</div>