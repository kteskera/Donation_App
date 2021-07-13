<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 11:39:50
  from 'C:\xampp\htdocs\zadaca_04\templates\lozinka.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee5f0661eca45_10669012',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0dd0556e02474bb3b65e31399c3b8bf049842a89' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\lozinka.tpl',
      1 => 1592127581,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee5f0661eca45_10669012 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="formalozinka"  method="POST" novalidate>
    <div class="container">
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
        <label for="lozinka"><b>Lozinka</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[0])) {
echo $_smarty_tpl->tpl_vars['style']->value[0];
}?> id="lozinka" type="password" placeholder="Unesi lozinku" name="Lozinka" value="<?php if (isset($_smarty_tpl->tpl_vars['lozinka']->value)) {
echo $_smarty_tpl->tpl_vars['lozinka']->value;
}?>" <?php if (isset($_smarty_tpl->tpl_vars['zakljucaj']->value)) {
echo $_smarty_tpl->tpl_vars['zakljucaj']->value;
}?> required>

        <label for="ponoviLozinku"><b>Ponovi lozinku</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[1])) {
echo $_smarty_tpl->tpl_vars['style']->value[1];
}?> id="ponoviLozinku" type="password" placeholder="Ponovi lozinku" name="ponoviLozinku" required>
        
            <button class="loginbtn" type="submit" name="submitlozinka" value="Promjena">Promjeni</button>
        <hr>
    </div>
</form><?php }
}
