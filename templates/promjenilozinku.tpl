<form id="formaemailkorime"  method="POST" novalidate>
<div id="formaprovjera" class="container">
    <h1 class="naslov">Promjeni lozinku</h1>
    <p>Popuni podatke kako bi promjenio/la lozinku.</p>
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
    <label for="emaik"><b>Email</b></label>
    <input {if isset($style[1])}{$style[1]}{/if} id="email" type="email" placeholder="Unesi lozinku" name="email" required>
    <button id="provjerabtn" class="loginbtn" type="submit" name="submitprovjera" value="Provjera">Provjeri</button>
    <hr>
</div>
</form>
