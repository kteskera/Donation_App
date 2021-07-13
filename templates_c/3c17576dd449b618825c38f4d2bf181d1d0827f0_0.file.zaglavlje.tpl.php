<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 16:35:00
  from 'C:\xampp\htdocs\zadaca_04\templates\zaglavlje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee8d89420fe06_31218120',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c17576dd449b618825c38f4d2bf181d1d0827f0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\zaglavlje.tpl',
      1 => 1592305616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee8d89420fe06_31218120 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="application-name" content="Smartphone world">
        <meta name="author" content="Karlo Teskera">
        <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
        <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
        <link rel="stylesheet" media="screen and (min-width: 1024px)" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/css/kteskera.css">
        <link rel="stylesheet" media="screen and (max-width: 1024px)" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/css/kteskera_prilagodbe.css">
        <link rel="stylesheet" media="print" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/css/kteskera_ispis.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/javascript/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/javascript/privatno.js"><?php echo '</script'; ?>
>
        <?php if ($_smarty_tpl->tpl_vars['title']->value === "Registracija") {?>
            <?php echo '<script'; ?>
 src="../javascript/EmailUsernameControl.js" type="text/javascript"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js" async defer><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer><?php echo '</script'; ?>
>
        <?php }?>
        <?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"><?php echo '</script'; ?>
>


        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    </head>

    <body class="formabody">
        <header class="header">
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">
                <img class="imgPokusaj" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/finalno.jpg" alt="Logo"></a>
            <div class="headerOznaka">Donacije</div>
            <form class="example" action="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/zaglavlje.php" method="POST">
                <button class="odjavabtn" style="margin-right:20px;" name="odjavabtn"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</button>
            </form>
        </header>
        <hr class="pok">
        <div class='gridMenu'>
            <nav class='topnav'>
                <div class="navbar">
                    <div class="subnav">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">
                            <button class="subnavbtn"><i class="fa fa-home" aria-hidden="true"></i> Početna</button>
                        </form>
                        <div class="subnav-content">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/autor.php">O autoru</a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/dokumentacija.php">Dokumentacija</a>
                        </div>
                    </div>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/kategorije.php"><i class="fa fa-handshake-o" aria-hidden="true"> Donacije</i></a>
                    <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] < 4)) {?> <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/kategorije/donacija.php"><i class="fa fa-gift" aria-hidden="true"></i> Doniraj sredstva</a>
                        <?php }?>
                        <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] == 1)) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/kategorije/popiskategorija.php"><i class="fa fa-wrench" aria-hidden="true"></i> Upravljaj kategorijama</a>
                        <?php }?>
                        <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] < 3)) {?> <div class="subnav">
                                <form action="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/kategorije/popisprojekata.php">
                                    <button class="subnavbtn"><i class="fa fa-list" aria-hidden="true"></i> Projekti</button>
                                </form>
                                <div class="subnav-content">
                                    <a id="odaberizad" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/kategorije/zadaci.php"><i class="fa fa-tasks" aria-hidden="true"></i> Zadaci</a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/kategorije/korisnici.php"><i class="fa fa-users" aria-hidden="true"></i> Korisnici</a>
                                </div>
                    </div>
                <?php }?>
                <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] == 1)) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/postavke/postavke.php" class='Boja'><i class="fa fa-cog" aria-hidden="true"></i> Postavke</a>
                <?php }?>
                <?php if (!isset($_SESSION['uloga'])) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/registracija.php" class='Boja'><i class="fa fa-user-plus" aria-hidden="true"></i> Registracija</a>
                <?php }?>
                <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] < 4)) {?> <div class="subnav" style="float: right;">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/profil.php">
                            <button class="subnavbtn"><i class=" fa fa-user" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['korime']->value;?>
</button>
                        </form>
                        <div class="subnav-content" style="float: right;">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/registracija.php?idhid=<?php echo $_smarty_tpl->tpl_vars['id_korisnik']->value;?>
" style="float: right;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi osobne podatke</a>
                        </div>
            </div>
        <?php }?>
        </div>
        <hr class='new'>
        </nav>
        </div><?php }
}
