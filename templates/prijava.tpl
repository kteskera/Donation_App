<form action="prijava.php" method="GET" novalidate>
    <div class="container">
        <h1 class="naslov">Prijava</h1>
        <p>Popuni formu kako bi prijavio/la.</p>
        <div id="greske" style="color:red; ">
            {if isset({$greske}) }
                <p>{$greske}</p>
            {/if}
        </div>
        <div id="poruka" style="color: green; ">
            {if isset($poruka) }
                <p>{$poruka}</p>
            {/if}
        </div>
        <hr>
        <label for="korisnickoime"><b>Korisničko ime</b></label>
        <input {if isset($style[0])}{$style[0]}{/if} id="korisnickoime" type="text" placeholder="Unesi korisničko ime" name="korisnickoime" maxlength="15" required value="{if isset($korsime)}{$korsime}{/if}">

        <label for="lozinka"><b>Lozinka</b></label>
        <input {if isset($style[1])}{$style[1]}{/if} id="lozinka" type="password" placeholder="Unesi lozinku" name="lozinka" required>
        <div>
            <label><b class="c">Zapamti me <input type="checkbox" name="zapamti" value="zapamti"></b></label>
        </div>
        <button class="loginbtn" type="submit" name="submit" value="Prijavi se">Prijava</button>
        <hr>

        <p id="print" style="text-align: center;">Nemaš račun? <a href="registracija.php">Registriraj se</a>.<br> </p>
        <p style="text-align: center;">Zaboravio/la si lozinku? <a href="../dohvati_podatke/promjenilozinku.php">Promjeni</a>.</p>


    </div>
</form>