<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 13:55:19
  from 'C:\xampp\htdocs\zadaca_04\templates\korisnici.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0ca2726c214_59874855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36b8b721bed3f6ea81cb6821ccbd8d91f331fb14' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\korisnici.tpl',
      1 => 1591529252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0ca2726c214_59874855 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="margin-left: 15px;">
<div>
<h2 class="naslov">Odaberi kompetenciju kako bi se prikazali korisnici</h2>
    <select id="kompentencije" name="kompentencije">
        <option value='0'>Odaberi kompentenciju korisnika</option>
        <?php echo KreirajPadajuciIzbornik();?>

    </select>
</div>
<div id="sakrijtab">
<h2 class="naslovTablice">Korisnici</h2>
<table class="display" id="korisnicikompetencije" style=" width: 85%;text-align: center;">
            <thead>
                <tr>
                    <th class="stil">Ime</th>
                    <th class="stil">Prezime</th>
                    <th class="stil">Korisničko ime</th>
                    <th class="stil">Pošalji zahtjev za sudjelovanje</th>
                </tr>
            </thead>
            <tbody id="dodaj">
            </tbody>
        </table>
        </div>
</div><?php }
}
