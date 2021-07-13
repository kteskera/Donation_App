<form id="proba" method="POST" novalidate>
    <div class="container">
        <h1 class="naslov">{$akcija}</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color:red">
            {if isset({$greske})}
                <p>{$greske}</p>
            {/if}
        </div>
        <div id="poruka" style="color:green">
            {if isset({$poruka})}
                <p>{$poruka}</p>
            {/if}
        </div>
        <hr>
        <label for="ime"><b>Ime</b></label>
        <input {if isset($style[0])}{$style[0]}{/if} id="ime" type="text" placeholder="Unesi ime" name="Ime" value="{if isset($ime)}{$ime}{/if}" required>

        <label for="prezime"><b>Prezime</b></label>
        <input {if isset($style[1])}{$style[1]}{/if} id="prezime" type="text" placeholder="Unesi prezime" name="Prezime" value="{if isset($prezime)}{$prezime}{/if}" required>

        <label for="KorisnickoIme"><b>Korisničko ime</b></label>
        <input {if isset($style[2])}{$style[2]}{/if} id="KorisnickoIme" type="text" placeholder="Unesi korisničko ime" name="KorisnickoIme" value="{if isset($korsime)}{$korsime}{/if}" required {if isset($zakljucaj)}{$zakljucaj}{/if}>
        <div id="odgovor2" style="color:red">
        </div>

        <label for="email"><b>Email</b></label>
        <input {if isset($style[3])}{$style[3]}{/if} id="email" type="email" placeholder="Unesi email" name="email" value="{if isset($email)}{$email}{/if}" required {if isset($zakljucaj)}{$zakljucaj}{/if}>
        <div id="odgovor3" style="color:red">

        </div>
        <label for="lozinka"><b>Lozinka</b></label>
        <input {if isset($style[4])}{$style[4]}{/if} id="lozinka" type="password" placeholder="Unesi lozinku" name="Lozinka" value="{if isset($lozinka)}{$lozinka}{/if}" {if isset($zakljucaj)}{$zakljucaj}{/if} required>

        <label for="ponoviLozinku"><b>Ponovi lozinku</b></label>
        <input {if isset($style[6])}{$style[6]}{/if} id="ponoviLozinku" type="password" placeholder="Ponovi lozinku" name="ponoviLozinku" required>
        <div>
            <label><b class="c">Prihvati uvjete korištenja<input type="checkbox" name="uvjeti" value="uvjeti" {if isset($uvjeti)}{$uvjeti}{/if}></b></label>
        </div>
        <div class="my-div">
            <div class="g-recaptcha" data-sitekey="6LdY96IZAAAAAB7zk8E_hLmsYqPP6L5U4AwH3adG" data-size="normal"></div>
        </div>

        <input id="regbtn" type="submit" class="registerbtn" name="submit" value="{$akcija}">
        <hr>
        <div style="text-align: center;">
            <p id="print">Već imaš račun? <a href="prijava.php">Prijavi se</a>.</p>
        </div>
    </div>
</form>
<hr class="new">