<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 17:10:27
  from 'C:\xampp\htdocs\zadaca_04\templates\popis_videa.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0f7e32e5131_10360571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c91f57251e29acb6a89f6d8d7403dcef58303938' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\popis_videa.tpl',
      1 => 1590676016,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0f7e32e5131_10360571 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="sakrij2">
<?php if ((isset($_smarty_tpl->tpl_vars['rezultat']->value))) {?>
    <?php echo kreirajVideo($_smarty_tpl->tpl_vars['rezultat']->value,$_smarty_tpl->tpl_vars['rezultat2']->value);?>

    <?php }?>
  </div><?php }
}
