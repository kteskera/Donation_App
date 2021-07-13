<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 12:03:02
  from 'C:\xampp\htdocs\zadaca_04\templates\kategorije.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee5f5d67bf482_83847664',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44d5a33f256316cafdbf848c34753d0f8d4fe5f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\kategorije.tpl',
      1 => 1592128835,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee5f5d67bf482_83847664 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="text-align:center;">
    <button id="odaberikategorije" class="odaberitablicu"><i class="fa fa-list" aria-hidden="true"></i> Kategorije</button>
    <button id="odaberiprojekte" class="odaberitablicu"><i class="fa fa-list" aria-hidden="true"></i> Projekti</button>
</div>
<div class="sakrij2">
    <div id="sakrijkategorije">
        <h2 class="naslovTablice">Kategorije projekata</h2>
        <table id="popiskategorija" class="display" style="width: 50%; text-align: center;">
            <thead>
                <tr>
                    <th class="stil">Naziv kategorije</th>
                    <th class="stil">Broj projekata</th>
                    <th class="stil">Video projekata</th>
                </tr>
            </thead>
            <tbody id="dodaj">
                <?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
                    <?php echo KreirajTablicu($_smarty_tpl->tpl_vars['result']->value);?>

                <?php }?>
            </tbody>
        </table>
    </div>

    <div id="sakrijprojekte" style="text-align: center;">
        <h2 class="naslovTablice">Popis projekata</h2>
        <button id="toogle" class="odaberitablicu"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
        <div id="filterdiv" style="text-align: center;" >

            <fieldset id="filterfild"  style="border: 2px solid #dad7d7f3;  margin-left: 100px;margin-right: 100px;">
            <label for="date"><b>Datum početka</b></label>
            <input style="width: 15%;" type="date" id="date" name="date">
            <label for="date"><b>Datum završetka</b></label>
            <input style="width: 15%;" type="date" id="dodate" name="dodate">
            <br>

            <button id="filter" class="odaberitablicu">Filtriraj</button>
            <button id="ponisti" class="odaberitablicu">Poništi filter</button>
            </fieldset>
            
            <div id="sakrijfilt">
            <hr class="new">
                <table id="popisprojekatafilt" class="display" style=" width: 85%;text-align: center;">
                    <thead>
                        <tr>
                            <th class="stil">Naziv</th>
                            <th class="stil">Akronim</th>
                            <th class="stil">Naziv kategorije</th>
                            <th class="stil">Datum početka</th>
                            <th class="stil">Datum završetka</th>
                            <th class="stil">Opis zahtjeva</th>
                            <th class="stil">Minimalni iznos donacija</th>
                            <th class="stil">Trenutni iznos donacija</th>
                        </tr>
                    </thead>
                    <tbody id="dodaj">

                    </tbody>
                </table>
            </div>
        </div>
        <hr class="new">
        <div id="sakrijproj">
            <table id="popisprojekata" class="display" style=" width: 85%;text-align: center;">
                <thead>
                    <tr>
                        <th class="stil">Naziv</th>
                        <th class="stil">Akronim</th>
                        <th class="stil">Kategorija projekta</th>
                        <th class="stil">Datum početka</th>
                        <th class="stil">Datum završetka</th>
                        <th class="stil">Opis zahtjeva</th>
                        <th class="stil">Minimalni iznos donacija</th>
                        <th class="stil">Trenutni iznos donacija</th>
                    </tr>
                </thead>
                <tbody id="dodaj">
                    <?php if ((isset($_smarty_tpl->tpl_vars['result2']->value))) {?>
                        <?php echo KreirajTablicu2($_smarty_tpl->tpl_vars['result2']->value);?>

                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div><?php }
}
