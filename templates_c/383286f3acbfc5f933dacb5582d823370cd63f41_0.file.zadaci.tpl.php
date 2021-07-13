<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 15:54:57
  from 'C:\xampp\htdocs\zadaca_04\templates\zadaci.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee62c31a12cb2_14744989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '383286f3acbfc5f933dacb5582d823370cd63f41' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\zadaci.tpl',
      1 => 1592142895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee62c31a12cb2_14744989 (Smarty_Internal_Template $_smarty_tpl) {
?><a id="kreirajzad" style="cursor: pointer; margin-left:10px"><i class="fa fa-plus" aria-hidden="true"></i> Kreiraj</a>
<a id="prikazizad" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-list" aria-hidden="true"></i> Prikaži zadatke</a>
<div id="sakrijzadtke" style="margin-left: 15px;">
    <div style="display: inline;">
        <hr class="new">
        <h2 class="naslov">Odaberi kategoriju i naziv projekta</h2>
        <hr class="new">
        <div>
            <select id="selekcijakategorije" name="selekcijakategorije">
                <option>Odaberi</option>
                <?php echo KreirajPadajuciIzbornik();?>

            </select>
        </div>
        <div id="projsele">
            <select id="selekcijaprojekta" name="selekcijaprojekta">
                <option value='0'>Odaberi naziv projekta</option>
                </option>
            </select>
        </div>
        <button id="prikaziprojekte" class="odaberitablicu" name="kreirajtbl" value="kreiraj" style="width:31%">Prikaži zadatke</button>
    </div>
    <div id="sakrijzadatke" style="text-align: center;">
        <h2 class="naslovTablice">Popis zadataka</h2>
        <button id="toogle" class="odaberitablicu" style="width: 10%;"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
        <fieldset id="filterfild" style="border: 2px solid #dad7d7f3;  margin-left: 100px;margin-right: 100px; text-align: center;">
            <label for="date"><b>Datum početka</b></label>
            <input style="width: 15%;" type="date" id="date" name="date">
            <label for="date"><b>Datum završetka</b></label>
            <input style="width: 15%;" type="date" id="dodate" name="dodate">
            <br>

            <button id="filter" class="odaberitablicu">Filtriraj</button>
            <button id="ponisti" class="odaberitablicu">Poništi filter</button>
        </fieldset>
        <hr class="new">
        <table class="display" id="zadaci" style=" width: 85%;text-align: center;">

            <thead>
                <tr>
                    <th class="stil">Opis</th>
                    <th class="stil">Datum početka</th>
                    <th class="stil">Datum završetka</th>
                    <th class="stil">Zaduženi član zadatka</th>
                    <th class="stil">Uredi</th>
                    <th class="stil">Obriši</th>
                </tr>
            </thead>
            <tbody id="dodaj">
            </tbody>
        </table>
    </div>
</div>
<div id="sakrijkreiranje" style="margin-left: 15px;">
    <div style="display: inline;">
        <hr class="new">
        <h2 class="naslov">Odaberi kategoriju i projekt za koji želiš kreirati zadatak</h2>
        <hr class="new">
        <form action="zadatak.php" method="GET">

            <div>
                <select id="selekcijakategorijekrei" name="selekcijakategorije">
                    <option>Odaberi</option>
                    <?php echo KreirajPadajuciIzbornik();?>

                </select>
            </div>
            <select id="selekcijaprojektakrei" name="selekcijaprojekta2">
                </option>
            </select>
            <div id="greske" style="color: red"></div>
            <form>
                <button id="kreirajzad22" class="odaberitablicu" name="kreirajtbl" value="kreiraj" style="width:31%">Kreiraj zadatak</button>
    </div>

</div><?php }
}
