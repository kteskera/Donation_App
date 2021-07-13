<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 11:51:33
  from 'C:\xampp\htdocs\zadaca_04\templates\prijava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee89625dee408_96433270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94660ea9612f31c073bfdc8fba4c41440f93cf39' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\prijava.tpl',
      1 => 1592301091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee89625dee408_96433270 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="prijava.php" method="GET" novalidate>
    <div class="container">
        <h1 class="naslov">Prijava</h1>
        <p>Popuni formu kako bi prijavio/la.</p>
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

        <label for="lozinka"><b>Lozinka</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[1])) {
echo $_smarty_tpl->tpl_vars['style']->value[1];
}?> id="lozinka" type="password" placeholder="Unesi lozinku" name="lozinka" required>
        <div>
            <label><b class="c">Zapamti me <input type="checkbox" name="zapamti" value="zapamti"></b></label>
        </div>
        <button class="loginbtn" type="submit" name="submit" value="Prijavi se">Prijava</button>
        <hr>

        <p id="print" style="text-align: center;">Nemaš račun? <a href="registracija.php">Registriraj se</a>.<br> </p>
        <p style="text-align: center;">Zaboravio/la si lozinku? <a href="../dohvati_podatke/promjenilozinku.php">Promjeni</a>.</p>


    </div>
</form><?php }
}
