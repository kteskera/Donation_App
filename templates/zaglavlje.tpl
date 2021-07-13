<!DOCTYPE html>
<html lang="hr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="application-name" content="Smartphone world">
        <meta name="author" content="Karlo Teskera">
        <meta name="description" content="{$description}">
        <meta name="keywords" content="{$keywords}">
        <link rel="stylesheet" media="screen and (min-width: 1024px)" href="{$putanja}/css/kteskera.css">
        <link rel="stylesheet" media="screen and (max-width: 1024px)" href="{$putanja}/css/kteskera_prilagodbe.css">
        <link rel="stylesheet" media="print" href="{$putanja}/css/kteskera_ispis.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

        <script src="{$putanja}/javascript/jquery.js"></script>
        <script src="{$putanja}/javascript/privatno.js"></script>
        {if $title === "Registracija"}
            <script src="../javascript/EmailUsernameControl.js" type="text/javascript"></script>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
        {/if}
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>


        <title>{$title}</title>
    </head>

    <body class="formabody">
        <header class="header">
            <a href="{$putanja}/index.php">
                <img class="imgPokusaj" src="{$putanja}/multimedija/finalno.jpg" alt="Logo"></a>
            <div class="headerOznaka">Donacije</div>
            <form class="example" action="{$putanja}/zaglavlje.php" method="POST">
                <button class="odjavabtn" style="margin-right:20px;" name="odjavabtn">{$status}</button>
            </form>
        </header>
        <hr class="pok">
        <div class='gridMenu'>
            <nav class='topnav'>
                <div class="navbar">
                    <div class="subnav">
                        <form action="{$putanja}/index.php">
                            <button class="subnavbtn"><i class="fa fa-home" aria-hidden="true"></i> Početna</button>
                        </form>
                        <div class="subnav-content">
                            <a href="{$putanja}/autor.php">O autoru</a>
                            <a href="{$putanja}/dokumentacija.php">Dokumentacija</a>
                        </div>
                    </div>
                    <a href="{$putanja}/kategorije.php"><i class="fa fa-handshake-o" aria-hidden="true"> Donacije</i></a>
                    {if (isset($smarty.session.uloga) && $smarty.session.uloga<4)} <a href="{$putanja}/kategorije/donacija.php"><i class="fa fa-gift" aria-hidden="true"></i> Doniraj sredstva</a>
                        {/if}
                        {if (isset($smarty.session.uloga) && $smarty.session.uloga==1)}
                            <a href="{$putanja}/kategorije/popiskategorija.php"><i class="fa fa-wrench" aria-hidden="true"></i> Upravljaj kategorijama</a>
                        {/if}
                        {if (isset($smarty.session.uloga) && $smarty.session.uloga<3)} <div class="subnav">
                                <form action="{$putanja}/kategorije/popisprojekata.php">
                                    <button class="subnavbtn"><i class="fa fa-list" aria-hidden="true"></i> Projekti</button>
                                </form>
                                <div class="subnav-content">
                                    <a id="odaberizad" href="{$putanja}/kategorije/zadaci.php"><i class="fa fa-tasks" aria-hidden="true"></i> Zadaci</a>
                                    <a href="{$putanja}/kategorije/korisnici.php"><i class="fa fa-users" aria-hidden="true"></i> Korisnici</a>
                                </div>
                    </div>
                {/if}
                {if (isset($smarty.session.uloga) && $smarty.session.uloga==1)}
                    <a href="{$putanja}/postavke/postavke.php" class='Boja'><i class="fa fa-cog" aria-hidden="true"></i> Postavke</a>
                {/if}
                {if not isset($smarty.session.uloga)}
                    <a href="{$putanja}/obrasci/registracija.php" class='Boja'><i class="fa fa-user-plus" aria-hidden="true"></i> Registracija</a>
                {/if}
                {if (isset($smarty.session.uloga) && $smarty.session.uloga<4)} <div class="subnav" style="float: right;">
                        <form action="{$putanja}/profil.php">
                            <button class="subnavbtn"><i class=" fa fa-user" aria-hidden="true"></i> {$korime}</button>
                        </form>
                        <div class="subnav-content" style="float: right;">
                            <a href="{$putanja}/obrasci/registracija.php?idhid={$id_korisnik}" style="float: right;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Uredi osobne podatke</a>
                        </div>
            </div>
        {/if}
        </div>
        <hr class='new'>
        </nav>
        </div>