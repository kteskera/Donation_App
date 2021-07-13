<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 14:40:28
  from 'C:\xampp\htdocs\zadaca_04\templates\rijesizadatak.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0d4bcedf166_57545370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55c251c081c092394aea4ec48af040c1fff3ce89' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\rijesizadatak.tpl',
      1 => 1591271397,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0d4bcedf166_57545370 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            <?php if (isset($_smarty_tpl->tpl_vars['poruka']->value)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
            <?php }?>
        </div>
        <h1 class="naslov">Riješi zadatak</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color: red">
            <?php if (isset($_smarty_tpl->tpl_vars['greske']->value)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['greske']->value;?>
</p>
            <?php }?>
        </div>
        <hr>
        <label for="sadrzaj" style="display: block;"><b>Naziv videa</b></label>
        <input type="text" <?php if (isset($_smarty_tpl->tpl_vars['style']->value[0])) {
echo $_smarty_tpl->tpl_vars['style']->value[0];
}?> id="nazivvidea" name="nazivvidea" placeholder="Unesi naziv" value="<?php if (isset($_smarty_tpl->tpl_vars['nazivvidea']->value)) {
echo $_smarty_tpl->tpl_vars['nazivvidea']->value;
}?>">

        <?php if (($_smarty_tpl->tpl_vars['provjera']->value)) {?>
        <?php if (isset($_smarty_tpl->tpl_vars['nesto']->value)) {
echo $_smarty_tpl->tpl_vars['nesto']->value;
}?>
        <?php }?>    

        <label style="display:block; margin-bottom: 10px;"><b>Postaviti javno</b></label>
        <label><b class="d">Da<input type="radio" name="vidljivost" value="1" <?php if (isset($_smarty_tpl->tpl_vars['vidljivost2']->value)) {
ob_start();
echo $_smarty_tpl->tpl_vars['vidljivost2']->value;
$_prefixVariable1 = ob_get_clean();
if (($_prefixVariable1 === "1")) {?>checked<?php }
}?>></b></label>
        <label><b class="d">Ne<input type="radio" name="vidljivost" value="0" <?php if (isset($_smarty_tpl->tpl_vars['vidljivost2']->value)) {
ob_start();
echo $_smarty_tpl->tpl_vars['vidljivost2']->value;
$_prefixVariable2 = ob_get_clean();
if (($_prefixVariable2 === "0")) {?>checked<?php }
}?>></b></label>
        <hr class="new">
        <button class="posaljibtn" type="submit" name="submit" value="Pošalji">Pošalji</button>
    </div>
</form>
<div id="poruka" style="color: green">
    <?php if (isset($_smarty_tpl->tpl_vars['poruka']->value)) {?><p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p><?php }?>
</div><?php }
}
