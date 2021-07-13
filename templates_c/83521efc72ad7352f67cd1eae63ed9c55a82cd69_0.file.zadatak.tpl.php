<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 13:53:47
  from 'C:\xampp\htdocs\zadaca_04\templates\zadatak.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0c9cb2dcf51_06260395',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83521efc72ad7352f67cd1eae63ed9c55a82cd69' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\zadatak.tpl',
      1 => 1591353882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0c9cb2dcf51_06260395 (Smarty_Internal_Template $_smarty_tpl) {
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
}?> zadatak</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color: red">
            <?php if (isset($_smarty_tpl->tpl_vars['greske']->value)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['greske']->value;?>
</p>
            <?php }?>
        </div>
        <hr>
        <label for="sadrzaj" style="display: block;"><b>Opis zadatka</b></label>
        <textarea <?php if (isset($_smarty_tpl->tpl_vars['style']->value[0])) {
echo $_smarty_tpl->tpl_vars['style']->value[0];
}?> id="opiszadatka" name="opiszadatka" rows="2" cols="50"><?php if (isset($_smarty_tpl->tpl_vars['opiszadatka']->value)) {
echo $_smarty_tpl->tpl_vars['opiszadatka']->value;
}?></textarea>

        <label for="naziv" style="display: block;"><b>Datum početka</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[1])) {
echo $_smarty_tpl->tpl_vars['style']->value[1];
}?> id="datumpocetka" type="datetime-local" placeholder="Unesi naslov" name="datumpocetka" value="<?php if (isset($_smarty_tpl->tpl_vars['datumpocetka']->value)) {
echo $_smarty_tpl->tpl_vars['datumpocetka']->value;
}?>">

        <label for="naziv" style="display: block;"><b>Zaduženi za zadatak</b>
            <div>
                <select name="selekcijakorisnika" id="zadatakselection">
                    <?php if (isset($_smarty_tpl->tpl_vars['zastavica']->value) && $_smarty_tpl->tpl_vars['zastavica']->value == true) {?>
                    <?php echo kreirajpadajucikorisnici();
}?>
                    <?php if (isset($_smarty_tpl->tpl_vars['zastavica']->value) && $_smarty_tpl->tpl_vars['zastavica']->value == false) {?>
                        <?php if (isset($_smarty_tpl->tpl_vars['selekcija']->value)) {
echo $_smarty_tpl->tpl_vars['selekcija']->value;
}?>
                            <?php echo kreirajpadajucikorisnici2();?>

                    <?php }?>
                </select>
            </div>
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
