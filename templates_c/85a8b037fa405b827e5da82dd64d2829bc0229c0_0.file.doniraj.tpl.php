<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 13:52:31
  from 'C:\xampp\htdocs\zadaca_04\templates\doniraj.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0c97fd1c6c9_85126883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85a8b037fa405b827e5da82dd64d2829bc0229c0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\doniraj.tpl',
      1 => 1591724675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0c97fd1c6c9_85126883 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            <?php if (isset($_smarty_tpl->tpl_vars['poruka']->value)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
            <?php }?>
        </div>
        <h1 class="naslov">Doniraj sredstva</h1>
        <p>Unesi iznos.</p>
        <div id="greske" style="color: red">
            <?php if (isset($_smarty_tpl->tpl_vars['greske']->value)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['greske']->value;?>
</p>
            <?php }?>
        </div>
        <hr>
        <label for="sadrzaj" style="display: block;"><b>Iznos donacije</b></label>
        <input type="text" <?php if (isset($_smarty_tpl->tpl_vars['style']->value[0])) {
echo $_smarty_tpl->tpl_vars['style']->value[0];
}?> id="iznos" name="iznos" placeholder="Unesi iznos">
        <button class="posaljibtn" type="submit" name="submit" value="Pošalji">Doniraj</button>
    </div>
</form><?php }
}
