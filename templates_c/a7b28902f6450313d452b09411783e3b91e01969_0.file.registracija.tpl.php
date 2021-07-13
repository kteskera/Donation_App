<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-15 18:48:36
  from 'C:\xampp\htdocs\zadaca_04\templates\registracija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee7a664f2e517_03759630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7b28902f6450313d452b09411783e3b91e01969' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\registracija.tpl',
      1 => 1592219004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee7a664f2e517_03759630 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="proba" method="POST" novalidate>
    <div class="container">
        <h1 class="naslov"><?php echo $_smarty_tpl->tpl_vars['akcija']->value;?>
</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color:red">
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['greske']->value;
$_prefixVariable1 = ob_get_clean();
if (isset($_prefixVariable1)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['greske']->value;?>
</p>
            <?php }?>
        </div>
        <div id="poruka" style="color:green">
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['poruka']->value;
$_prefixVariable2 = ob_get_clean();
if (isset($_prefixVariable2)) {?>
                <p><?php echo $_smarty_tpl->tpl_vars['poruka']->value;?>
</p>
            <?php }?>
        </div>
        <hr>
        <label for="ime"><b>Ime</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[0])) {
echo $_smarty_tpl->tpl_vars['style']->value[0];
}?> id="ime" type="text" placeholder="Unesi ime" name="Ime" value="<?php if (isset($_smarty_tpl->tpl_vars['ime']->value)) {
echo $_smarty_tpl->tpl_vars['ime']->value;
}?>" required>

        <label for="prezime"><b>Prezime</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[1])) {
echo $_smarty_tpl->tpl_vars['style']->value[1];
}?> id="prezime" type="text" placeholder="Unesi prezime" name="Prezime" value="<?php if (isset($_smarty_tpl->tpl_vars['prezime']->value)) {
echo $_smarty_tpl->tpl_vars['prezime']->value;
}?>" required>

        <label for="KorisnickoIme"><b>Korisničko ime</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[2])) {
echo $_smarty_tpl->tpl_vars['style']->value[2];
}?> id="KorisnickoIme" type="text" placeholder="Unesi korisničko ime" name="KorisnickoIme" value="<?php if (isset($_smarty_tpl->tpl_vars['korsime']->value)) {
echo $_smarty_tpl->tpl_vars['korsime']->value;
}?>" required <?php if (isset($_smarty_tpl->tpl_vars['zakljucaj']->value)) {
echo $_smarty_tpl->tpl_vars['zakljucaj']->value;
}?>>
        <div id="odgovor2" style="color:red">
        </div>

        <label for="email"><b>Email</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[3])) {
echo $_smarty_tpl->tpl_vars['style']->value[3];
}?> id="email" type="email" placeholder="Unesi email" name="email" value="<?php if (isset($_smarty_tpl->tpl_vars['email']->value)) {
echo $_smarty_tpl->tpl_vars['email']->value;
}?>" required <?php if (isset($_smarty_tpl->tpl_vars['zakljucaj']->value)) {
echo $_smarty_tpl->tpl_vars['zakljucaj']->value;
}?>>
        <div id="odgovor3" style="color:red">

        </div>
        <label for="lozinka"><b>Lozinka</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[4])) {
echo $_smarty_tpl->tpl_vars['style']->value[4];
}?> id="lozinka" type="password" placeholder="Unesi lozinku" name="Lozinka" value="<?php if (isset($_smarty_tpl->tpl_vars['lozinka']->value)) {
echo $_smarty_tpl->tpl_vars['lozinka']->value;
}?>" <?php if (isset($_smarty_tpl->tpl_vars['zakljucaj']->value)) {
echo $_smarty_tpl->tpl_vars['zakljucaj']->value;
}?> required>

        <label for="ponoviLozinku"><b>Ponovi lozinku</b></label>
        <input <?php if (isset($_smarty_tpl->tpl_vars['style']->value[6])) {
echo $_smarty_tpl->tpl_vars['style']->value[6];
}?> id="ponoviLozinku" type="password" placeholder="Ponovi lozinku" name="ponoviLozinku" required>
        <div>
            <label><b class="c">Prihvati uvjete korištenja<input type="checkbox" name="uvjeti" value="uvjeti" <?php if (isset($_smarty_tpl->tpl_vars['uvjeti']->value)) {
echo $_smarty_tpl->tpl_vars['uvjeti']->value;
}?>></b></label>
        </div>
        <div class="my-div">
            <div class="g-recaptcha" data-sitekey="6LdY96IZAAAAAB7zk8E_hLmsYqPP6L5U4AwH3adG" data-size="normal"></div>
        </div>

        <input id="regbtn" type="submit" class="registerbtn" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['akcija']->value;?>
">
        <hr>
        <div style="text-align: center;">
            <p id="print">Već imaš račun? <a href="prijava.php">Prijavi se</a>.</p>
        </div>
    </div>
</form>
<hr class="new"><?php }
}
