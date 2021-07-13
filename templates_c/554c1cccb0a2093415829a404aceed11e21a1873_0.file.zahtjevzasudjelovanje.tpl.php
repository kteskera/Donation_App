<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-13 14:50:26
  from 'C:\xampp\htdocs\zadaca_04\templates\zahtjevzasudjelovanje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee4cb92076301_07227791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '554c1cccb0a2093415829a404aceed11e21a1873' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\zahtjevzasudjelovanje.tpl',
      1 => 1592052581,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee4cb92076301_07227791 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            <?php if (isset($_smarty_tpl->tpl_vars['poruka']->value)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
            <?php }?>
        </div>
        <h1 class="naslov">Pošalji zahtjev za sudjelovanje</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color: red">
            <?php if (isset($_smarty_tpl->tpl_vars['greske']->value)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['greske']->value;?>
</p>
            <?php }?>
        </div>
        <hr>
        <label for="projekt" style="display: block;"><b>Popis projekata</b></label>
        <select id="projekt" name="projekt" <?php if (isset($_smarty_tpl->tpl_vars['style']->value[0])) {
echo $_smarty_tpl->tpl_vars['style']->value[0];
}?>>
        <option value='0'>Odaberi projekt</option>
        <?php echo KreirajPadajuciIzbornik2();?>

    </select>

        <label for="projekt" style="display: block;"><b>Opis zahtjeva</b></label>
        <textarea <?php if (isset($_smarty_tpl->tpl_vars['style']->value[1])) {
echo $_smarty_tpl->tpl_vars['style']->value[1];
}?> id="opiszahtjeva" name="opiszahtjeva" rows="2" cols="50"><?php if (isset($_smarty_tpl->tpl_vars['opiszadatka']->value)) {
echo $_smarty_tpl->tpl_vars['opiszadatka']->value;
}?></textarea>

            <button class="posaljibtn" type="submit" name="submit" value="Pošalji">Pošalji</button>
    </div>
</form>
<div id="poruka" style="color: green">
    <?php if (isset($_smarty_tpl->tpl_vars['poruka']->value)) {?><p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p><?php }?>
</div><?php }
}
