<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 17:12:25
  from 'C:\xampp\htdocs\zadaca_04\templates\projekt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0f8596ebab8_06737752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73076f7c80e8d25504691c656115ba65f66556d9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\projekt.tpl',
      1 => 1591023694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0f8596ebab8_06737752 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            <?php if (isset($_smarty_tpl->tpl_vars['poruka']->value)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
            <?php }?>
        </div>
        <h1 class="naslov"><?php if (isset($_smarty_tpl->tpl_vars['stanje']->value)) {
echo $_smarty_tpl->tpl_vars['stanje']->value;
}?> projekt</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color: red">
            <?php if (isset($_smarty_tpl->tpl_vars['greske']->value)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['greske']->value;?>
</p>
            <?php }?>
        </div>
        <hr>
        <label for="naziv" style="display: block;"><b>Naziv projekta</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[0])) {
echo $_smarty_tpl->tpl_vars['style']->value[0];
}?> id="naziv" type="text" placeholder="Unesi naslov" name="naziv" value="<?php if (isset($_smarty_tpl->tpl_vars['naziv']->value)) {
echo $_smarty_tpl->tpl_vars['naziv']->value;
}?>">

        <label for="naziv" style="display: block;"><b>Akronim projekta</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[1])) {
echo $_smarty_tpl->tpl_vars['style']->value[1];
}?> id="akornim" type="text" placeholder="Unesi akronim" name="akronim" value="<?php if (isset($_smarty_tpl->tpl_vars['akronim']->value)) {
echo $_smarty_tpl->tpl_vars['akronim']->value;
}?>">

        <label for="datum"><b>Datum početka projekta:</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[2])) {
echo $_smarty_tpl->tpl_vars['style']->value[2];
}?> id="datumpocetka" type="datetime-local" name="datumpocetka" value="<?php if (isset($_smarty_tpl->tpl_vars['datumpocetka']->value)) {
echo $_smarty_tpl->tpl_vars['datumpocetka']->value;
}?>">

        <label for="datum"><b>Datum početka završetka:</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[3])) {
echo $_smarty_tpl->tpl_vars['style']->value[3];
}?> id="datumzavrsetka" type="datetime-local" name="datumzavrsetka" value="<?php if (isset($_smarty_tpl->tpl_vars['datumzavrsetka']->value)) {
echo $_smarty_tpl->tpl_vars['datumzavrsetka']->value;
}?>">

        <label for="sadrzaj" style="display: block;"><b>Opis zahtjeva projekta</b></label>
        <textarea <?php if (isset($_smarty_tpl->tpl_vars['style']->value[4])) {
echo $_smarty_tpl->tpl_vars['style']->value[4];
}?> id="opiszahtjeva" name="opiszahtjeva" rows="2" cols="50"><?php if (isset($_smarty_tpl->tpl_vars['opiszahtjeva']->value)) {
echo $_smarty_tpl->tpl_vars['opiszahtjeva']->value;
}?></textarea>

        <label for="donacije" style="display: block;"><b>Minimalni iznos donacije</b></>
            <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[5])) {
echo $_smarty_tpl->tpl_vars['style']->value[5];
}?> id="miniznos" type="text" placeholder="Unesi iznos" name="miniznos" value="<?php if (isset($_smarty_tpl->tpl_vars['miniznos']->value)) {
echo $_smarty_tpl->tpl_vars['miniznos']->value;
}?>">

            <button class="posaljibtn" type="submit" name="submit" value="<?php if (isset($_smarty_tpl->tpl_vars['stanje']->value)) {
echo $_smarty_tpl->tpl_vars['stanje']->value;
}?>"><?php if (isset($_smarty_tpl->tpl_vars['stanje']->value)) {
echo $_smarty_tpl->tpl_vars['stanje']->value;
}?></button>
    </div>
</form>
<div id="poruka" style="color: green">
    <?php if (isset($_smarty_tpl->tpl_vars['poruka']->value)) {?><p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p><?php }?>
</div><?php }
}
