<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-15 18:50:06
  from 'C:\xampp\htdocs\zadaca_04\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee7a6be7fbc15_76496189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23134231692d02c539af79c8df55702048d2a6b2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\index.tpl',
      1 => 1592239775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee7a6be7fbc15_76496189 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="hr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="application-name" content="Smartphone world">
        <meta name="author" content="Karlo Teskera">
        <meta name="description" content="Novosti u industriji pametnih telefona. 29.3.2020.">
        <meta name="keywords" content="Mobitel, Smarthpone, Operacijski sustav">

        <link rel="stylesheet" media="screen and (min-width: 1024px)" href="css/kteskera.css">
        <link rel="stylesheet" media="screen and (max-width: 1024px)" href="css/kteskera_prilagodbe.css">
        <link rel="stylesheet" media="print" href="css/kteskera_ispis.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="javascript/jquery.js"><?php echo '</script'; ?>
>

        <title>Donacije</title>
    </head>

    <body class="pocetnabody">
        <div class="grid-container">
            <div class="gridHeader">
                <header class="header">
                    <a href="index.php">
                        <img class="imgPokusaj" src="multimedija/finalno.jpg" alt="Logo"></a>
                    <div class="headerOznaka">Donacije</div>

                    <div style="display: inline; ">
                        <form class="example" action="zaglavlje.php" method="POST">
                            <button class="odjavabtn" style="margin-right:20px;" name="odjavabtn"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</button>
                        </form>
                    </div>

                </header>
                <hr class="pok">
            </div>

            <div class='gridMenu'>
                <nav class='topnav'>
                    <div class="navbar">
                        <div class="subnav">
                            <form action="index.php">
                                <button class="subnavbtn"><i class="fa fa-home" aria-hidden="true"></i> Početna</button>
                            </form>
                            <div class="subnav-content">
                                <a href="autor.php">O autoru</a>
                                <a href="dokumentacija.php">Dokumentacija</a>
                            </div>
                        </div>
                        <a href="kategorije.php"><i class="fa fa-handshake-o" aria-hidden="true"> Donacije</i></a>
                        <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] < 4)) {?> <a href="kategorije/donacija.php"><i class="fa fa-gift" aria-hidden="true"></i> Doniraj sredstva</a>
                            <?php }?>
                            <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] == 1)) {?>
                                <a href="kategorije/popiskategorija.php"><i class="fa fa-wrench" aria-hidden="true"></i> Upravljaj kategorijama</a>
                            <?php }?>
                            <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] < 3)) {?> <div class="subnav">
                                    <form action="kategorije/popisprojekata.php">
                                        <button class="subnavbtn"><i class="fa fa-list" aria-hidden="true"></i> Projekti</button>
                                    </form>
                                    <div class="subnav-content">
                                        <a id="odaberizad" href="kategorije/zadaci.php"><i class="fa fa-tasks" aria-hidden="true"></i> Zadaci</a>
                                        <a href="kategorije/korisnici.php"><i class="fa fa-users" aria-hidden="true"></i> Korisnici</a>
                                    </div>
                        </div>
                    <?php }?>
                    <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] == 1)) {?>
                        <a href="postavke/postavke.php" class='Boja'><i class="fa fa-cog" aria-hidden="true"></i> Postavke</a>
                    <?php }?>
                    <?php if (!isset($_SESSION['uloga'])) {?>
                        <a href="obrasci/registracija.php" class='Boja'><i class="fa fa-user-plus" aria-hidden="true"></i> Registracija</a>
                    <?php }?>
                    <?php if ((isset($_SESSION['uloga']) && $_SESSION['uloga'] < 4)) {?> <div class="subnav" style="float: right;">
                            <form action="profil.php">
                                <button class="subnavbtn"><i class=" fa fa-user" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['korime']->value;?>
</button>
                            </form>
                            <div class="subnav-content" style="float: right;">
                                <a href="obrasci/registracija.php?idhid=<?php echo $_smarty_tpl->tpl_vars['id_korisnik']->value;?>
" style="float: right;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi osobne podatke</a>
                            </div>
                </div>
            <?php }?>
        </div>
        </nav>
        <hr class="pok">
        </div>
        </div>
        <div class="gridMain">

            <article>
                <div class="rowClanakPocetna">
                    <h1 class="naslovPocetna">Donacije</h1>
                    <div class="columnClanakPocetna">
                        <img title="donacije" style="height:300px; width: 600px;" src="multimedija/donacije.jpg" alt="donacije">
                    </div>
                    <div class="columnClanakPocetna">
                        <p>Svrha ove web stranice je dobrotvorni cilj darivanja zakladama, grupama, institucijama ili pojedincima.
                            Pojam 'donacija' označava i čin darovanja, i same predmete i vrijednosti koji su ustupljeni bez naknade.
                            <br>
                            <br>
                            Donator možeš biti i ti. Sve što je potrebno je registracija na našem servisu, potvrda računa i to je to.
                            Mnoge donacije su socijalno motivirane, ili se putem njih nastoji poboljšati javne sfere koje su važne za čitavu zajednicu.
                            <br>
                            <br>
                            Ukoliko iskažete želju možete i vi volontirati za nas. Kontaktirate nas putem emaila, naši moderatori pogledaju vaš zahtjev, te možete dobrovoljno raditi na određenim projektima.
                            Dobijete dodjeljeni radni zadatak - ukoliko su skupljen minimalni iznos projekta i sve što trebate je postaviti video rješenja na naš servis!
                            <br>
                            <br>
                            Ukoliko mislite da ste na pravom mjestu, <a href="obrasci/registracija.php">Registrirajte se!</a>
                        </p>
                    </div>
                </div>
            </article>
        </div>
        <br>
        <br>
        <hr class="new">
        <br>
        <br>
        <div class="gridFooter">
            <footer>
                <div class="footerfont">Donacije &copy; 2020 <a href="mailto:kteskera@foi.hr">kteskera@foi.hr</a></div>
            </footer>

        </div>
    </body>

</html><?php }
}
