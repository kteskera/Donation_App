<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 13:52:26
  from 'C:\xampp\htdocs\zadaca_04\templates\donacija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0c97acbaa17_24960304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13e7ef7651d0c4052484ba8d8632e93d6b22d060' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\donacija.tpl',
      1 => 1591724533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0c97acbaa17_24960304 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="margin-left: 15px;">
<h2 class="naslov">Odaberi kategoriju projekta</h2>
<hr class="new">
<div style="display: inline;">
    <div>
        <select id="selekcijakategorije" name="selekcijakategorije">
        echo "<option>--Odaberi kategoriju--</option>";
        <?php echo KreirajList();?>

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
                <th class="stil">Doniraj</th>
            </tr>
        </thead>
        <tbody id="dodaj">
        </tbody>
    </table>
</div>

</div><?php }
}
