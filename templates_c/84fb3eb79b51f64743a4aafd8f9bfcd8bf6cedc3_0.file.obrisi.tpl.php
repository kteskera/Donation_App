<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 13:51:01
  from 'C:\xampp\htdocs\zadaca_04\templates\obrisi.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0c925dc0452_40468388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84fb3eb79b51f64743a4aafd8f9bfcd8bf6cedc3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\obrisi.tpl',
      1 => 1590933577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0c925dc0452_40468388 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="text-align:Left;">
<p>Jeste li sigurni da želite obrisati?
<br>
<?php if ((isset($_smarty_tpl->tpl_vars['napomena']->value))) {?>
    <?php echo $_smarty_tpl->tpl_vars['napomena']->value;?>

<?php }?>
</p>
<form method="POST">
    <button id="da" name="da" class="odaberitablicu" style="width:8%;">Da</button>
    <button id="ne" name="ne" class="odaberitablicu" style="width:8%;">Ne</button>
<form>
</div><?php }
}
