<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 17:23:52
  from 'C:\xampp\htdocs\zadaca_04\templates\postavke.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee64108b95741_62917606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88497e9856f616442a842337bff9db7221fcb317' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\postavke.tpl',
      1 => 1592148023,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee64108b95741_62917606 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="text-align:center;margin-left: 30px;">
    <button id="uredikom" class="dropbtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi kompetencije</button>
    <button id="prikazipopis" class="dropbtn"><i class="fa fa-list" aria-hidden="true"></i> Popis korisnika</button>
    <button id="prikazipostavke" class="dropbtn"><i class="fa fa-cogs" aria-hidden="true"></i> Postavke stranice</button>
    <button id="dnevnikrada" class="dropbtn"><i class="fa fa-book" aria-hidden="true"></i> Dnevnik rada</button>
</div>
<hr class="new">
<div id="kompetencije">
    <a id="dodajkompetencije" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i> Kreiraj kompetencije</a>
    <a id="prikazikompetencije" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-list" aria-hidden="true"></i> Sve kompetencije</a>
    <br>
    <br>
    <div id="listakomp">
        <h2 class="naslovTablice">Popis kompetencija</h2>
        <table class="display" id="popiskompetencijatable" style=" width: 50%;text-align: center;">
            <thead>
                <tr>
                    <th class="stil">Naziv kompetencije</th>
                    <th class="stil">Ukloni</th>
                </tr>
            </thead>
            <tbody id="dodaj">
                <?php echo DohvatiKompetencije();?>

            </tbody>
        </table>
    </div>
    <div id="kreirajkompetencijudiv" style="text-align: left; margin-left: 15px;">
        <h2 class="naslov">Kreiraj kompetenciju</h2>
        <hr class="new">
        <form id="kompetencijeform" method="POST">
            <div id="greske" style="color: red">
                <?php if (isset($_smarty_tpl->tpl_vars['greske']->value)) {?>
                    <p><?php echo $_smarty_tpl->tpl_vars['greske']->value;?>
</p>
                <?php }?>
            </div>
            <div <?php if (isset($_smarty_tpl->tpl_vars['style']->value[0])) {
echo $_smarty_tpl->tpl_vars['style']->value[0];
}?>>
                <label for="naslov" style="display: block;"><b>Naziv kompetencije</b></label>
                <input id="kreirajkat" style="width:20.5%;display: block;" type="text" placeholder="Unesi naziv kompetencije" name="nazivkomp">
            </div>
            <button id="kompt" class="odaberitablicu" name="kreirajkomp" value="kreirajkomp" style="width:20.45%">Kreiraj kompetenciju</button>
        </form>
    </div>
</div>

<div id="popiskorisnika">
    <h2 class="naslovTablice">Popis korisnika</h2>
    <table class="display" id="popiskorisnikatbl" style=" width: 80%;text-align: center;">
        <thead>
            <tr>
                <th class="stil">Ime i prezime</th>
                <th class="stil">Korisničko ime</th>
                <th class="stil">Status računa</th>
                <th class="stil">Radnja</th>
                <th class="stil">Uvjeti korištenja</th>
                <th class="stil">Poništi uvijete korištenja</th>
            </tr>
        </thead>
        <tbody id="dodaj">
            <?php echo DohvatiKorisnike();?>

        </tbody>
    </table>
</div>

<div id="postavkestranice" style="margin-left: 15px;">
    <h2 class="naslovTablice">Postavke stranice</h2>
    <form name="virtualnovrijeme" id="virtualnovrijeme" method="POST">
        <fieldset style="width: 20.5%;">
            <legend>
                <a target="_blank" href="http://barka.foi.hr/WebDiP/pomak_vremena/vrijeme.html"> Postavi virtualno vrijeme</a>
            </legend>
            <label for="pomak" style="display: block;"><b>Pomak vremena</b></label>
            <label>JSON<input type="radio" name="pomak" value="json" checked></label>
        </fieldset>
        <button class="odaberitablicu" name="virtualnovrijemekrei" value="virtualnovrijemekrei" style="width:20.45%">Postavi</button>
    </form>
    <hr class="new">
    <div>
        <label for="naslov" style="display: block;"><b>Broj redaka za straničenje</b></label>
        <input id="inputstranicenje" type="number" placeholder="Unesi broj redaka" name="naslov" style="width:20.45%;display: block;">
        <div id="greske2" style="color: red"></div>
        <button id="stranicenje" class="odaberitablicu" name="stranicenje" value="stranicenje" style="width:20.45%">Postavi</button>
    </div>
    <hr class="new">
    <div>
        <form id="cookieform" method="POST">
            <label for="cookie"><b>Trajanje kolačića (u danima)</b></label>
            <input id="vrijemekolacica" type="number" placeholder="Unesi trajanje" name="trajanjekolacica" style="width:20.45%;display: block;">
            <div id="greske4" style="color: red"></div>
            <button id="vrijemekolacicabtn" class="odaberitablicu" name="cookie" value="stranicenje" style="width:20.45%">Postavi</button>
        </form>
    </div>
    <hr class="new">
    <div>
    <form id="sesijaform" method="POST">
        <label for="vrijemesesije"><b>Trajanje sesije (u minutama)</b></label>
        <input id="vrijemesesije" type="number" placeholder="Unesi trajanje" name="vrijemesesije" style="width:20.45%;display: block;">
        <div id="greske5" style="color: red"></div>
        <button id="vrijemesesijebtnn" class="odaberitablicu" name="vrijemesesijebtnn" value="vrijemesesijebtnn" style="width:20.45%">Postavi</button>
    </form>
</div>
<hr class="new">
    <div>
        <form id="adminform" method="GET" action="../dohvati_podatke/dodajadmina.php">
            <label for="datum"><b>Dodaj administratora</b></label>
            <select id="selkorisnici" name="selkorisnici">
                <option>--Odaberi korisnika--</option>
                <?php echo KreirajPadajuciIzbornik();?>

            </select>
            <div id="greske3" style="color: red"></div>
            <button id="adminbtn" class="odaberitablicu" name="submit" value="submit" style="width:20.45%">Dodaj</button>
        </form>
    </div>

</div>
<div id="dnevnikaktivnosti">
    <h2 class="naslovTablice">Dnevnik aktivnosti</h2>
    <table class="display" id="dnevnik" style=" width: 85%;text-align: center;">
        <thead>
            <tr>
                <th class="stil">Korisnik</th>
                <th class="stil">Tip radnje</th>
                <th class="stil">Upit</th>
                <th class="stil">Vrijeme</th>
                <th class="stil">Radnja</th>
            </tr>
        </thead>
        <tbody id="dodaj">
            <?php echo kreirajdnevnik();?>

        </tbody>
    </table>
</div><?php }
}
