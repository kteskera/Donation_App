<form id="formalozinka"  method="POST" novalidate>
    <div class="container">
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
        <label for="lozinka"><b>Lozinka</b></label>
        <input {if isset($style[0])}{$style[0]}{/if} id="lozinka" type="password" placeholder="Unesi lozinku" name="Lozinka" value="{if isset($lozinka)}{$lozinka}{/if}" {if isset($zakljucaj)}{$zakljucaj}{/if} required>

        <label for="ponoviLozinku"><b>Ponovi lozinku</b></label>
        <input {if isset($style[1])}{$style[1]}{/if} id="ponoviLozinku" type="password" placeholder="Ponovi lozinku" name="ponoviLozinku" required>
        
            <button class="loginbtn" type="submit" name="submitlozinka" value="Promjena">Promjeni</button>
        <hr>
    </div>
</form>