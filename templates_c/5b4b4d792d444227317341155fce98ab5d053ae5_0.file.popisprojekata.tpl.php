<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-13 22:41:05
  from 'C:\xampp\htdocs\zadaca_04\templates\popisprojekata.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee539e14ce820_75623516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b4b4d792d444227317341155fce98ab5d053ae5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\popisprojekata.tpl',
      1 => 1592080863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee539e14ce820_75623516 (Smarty_Internal_Template $_smarty_tpl) {
?><a id="kreirajproj" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i> Kreiraj novi projekt</a>
<a id="prikaziproj" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-list" aria-hidden="true"></i> Prikaži projekte</a>
<hr class="new">
<div id="sakrij2" style="text-align: left; margin-left: 15px;">
    <h2 class="naslov">Odaberi kategoriju projekta</h2>
    <hr class="new">
    <div style="display: inline;">
        <div>
            <select id="selekcijakategorije" name="selekcijakategorije">
            <option>--Odaberi kategoriju--</option>
                <?php echo KreirajPadajuciIzbornik();?>

            </select>
        </div>
    </div>
    <div id="sakrijsveprojekte">
    <h2 class="naslovTablice">Popis projekata</h2>
        <table class="display" id="odabranakategorija" style=" width: 85%;text-align: center;">
            <thead>
                <tr>
                    <th class="stil">Naziv</th>
                    <th class="stil">Akronim</th>
                    <th class="stil">Datum početka</th>
                    <th class="stil">Datum završetka</th>
                    <th class="stil">Opis zahtjeva</th>
                    <th class="stil">Minimalni iznos donacija</th>
                    <th class="stil">Trenutni iznos donacija</th>
                    
                    <th class="stil">Uredi</th>
                    <th class="stil">Obriši</th>
                    <th class="stil">Stanje</th>
                </tr>
            </thead>
            <tbody id="dodaj">
            </tbody>
        </table>
    </div>
</div>
<div id="sakrijkreiranje" style="text-align: left; margin-left: 15px;">
    <h2 class="naslov">Odaberi kategoriju za koju se kreira projekt</h2>
    <hr class="new">
    <form action="projekt.php" method="GET">
        <div>
            <select id="selekcijakategorije" name="selekcijakategorije">
                <?php echo KreirajPadajuciIzbornik();?>

            </select>
        </div>
        <button class="odaberitablicu" name="kreirajprojekt" style="width:31%">Odaberi kategoriju</button>
    </form>
</div><?php }
}
