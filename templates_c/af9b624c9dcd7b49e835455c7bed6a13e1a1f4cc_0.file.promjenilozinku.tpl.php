<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 11:39:44
  from 'C:\xampp\htdocs\zadaca_04\templates\promjenilozinku.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee5f06090c457_82352334',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af9b624c9dcd7b49e835455c7bed6a13e1a1f4cc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\promjenilozinku.tpl',
      1 => 1592127573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee5f06090c457_82352334 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="formaemailkorime"  method="POST" novalidate>
<div id="formaprovjera" class="container">
    <h1 class="naslov">Promjeni lozinku</h1>
    <p>Popuni podatke kako bi promjenio/la lozinku.</p>
    <div id="greske" style="color:red; ">
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['greske']->value;
$_prefixVariable1 = ob_get_clean();
if (isset($_prefixVariable1)) {?>
            <p><?php echo $_smarty_tpl->tpl_vars['greske']->value;?>
</p>
        <?php }?>
    </div>
    <div id="poruka" style="color: green; ">
        <?php if (isset($_smarty_tpl->tpl_vars['poruka']->value)) {?>
            <p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
        <?php }?>
    </div>
    <hr>
    <label for="korisnickoime"><b>Korisničko ime</b></label>
    <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[0])) {
echo $_smarty_tpl->tpl_vars['style']->value[0];
}?> id="korisnickoime" type="text" placeholder="Unesi korisničko ime" name="korisnickoime" maxlength="15" required value="<?php if (isset($_smarty_tpl->tpl_vars['korsime']->value)) {
echo $_smarty_tpl->tpl_vars['korsime']->value;
}?>">
    <label for="emaik"><b>Email</b></label>
    <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[1])) {
echo $_smarty_tpl->tpl_vars['style']->value[1];
}?> id="email" type="email" placeholder="Unesi lozinku" name="email" required>
    <button id="provjerabtn" class="loginbtn" type="submit" name="submitprovjera" value="Provjera">Provjeri</button>
    <hr>
</div>
</form>
<?php }
}
