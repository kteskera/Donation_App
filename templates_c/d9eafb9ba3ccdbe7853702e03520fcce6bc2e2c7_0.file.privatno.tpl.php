<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-12 11:59:47
  from 'C:\xampp\htdocs\zadaca_04\templates\privatno.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee3521312c4b6_09632321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9eafb9ba3ccdbe7853702e03520fcce6bc2e2c7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\privatno.tpl',
      1 => 1591955984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee3521312c4b6_09632321 (Smarty_Internal_Template $_smarty_tpl) {
?><h2 class="naslovTablice">Korisnici</h2>
    <table class="display" id="dnevnik" style=" width: 85%;text-align: center;">
        <thead>
            <tr>
                <th class="stil">Ime i prezime</th>
                <th class="stil">Korisničko ime</th>
                <th class="stil">Email</th>
                <th class="stil">Lozinka</th>
                <th class="stil">Sh1 lozinka</th>
            </tr>
        </thead>
        <tbody id="dodaj">
            <?php echo dohvatikorisnike();?>

        </tbody>
    </table><?php }
}
