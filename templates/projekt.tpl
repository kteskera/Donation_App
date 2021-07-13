<form method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            {if isset($poruka)}
                <p>{$poruka}</p>
            {/if}
        </div>
        <h1 class="naslov">{if isset($stanje)}{$stanje}{/if} projekt</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color: red">
            {if isset($greske)}
                <p>{$greske}</p>
            {/if}
        </div>
        <hr>
        <label for="naziv" style="display: block;"><b>Naziv projekta</b></label>
        <input {if isset($style[0])}{$style[0]}{/if} id="naziv" type="text" placeholder="Unesi naslov" name="naziv" value="{if isset($naziv)}{$naziv}{/if}">

        <label for="naziv" style="display: block;"><b>Akronim projekta</b></label>
        <input {if isset($style[1])}{$style[1]}{/if} id="akornim" type="text" placeholder="Unesi akronim" name="akronim" value="{if isset($akronim)}{$akronim}{/if}">

        <label for="datum"><b>Datum početka projekta:</b></label>
        <input {if isset($style[2])}{$style[2]}{/if} id="datumpocetka" type="datetime-local" name="datumpocetka" value="{if isset($datumpocetka)}{$datumpocetka}{/if}">

        <label for="datum"><b>Datum završetka projekta:</b></label>
        <input {if isset($style[3])}{$style[3]}{/if} id="datumzavrsetka" type="datetime-local" name="datumzavrsetka" value="{if isset($datumzavrsetka)}{$datumzavrsetka}{/if}">

        <label for="sadrzaj" style="display: block;"><b>Opis zahtjeva projekta</b></label>
        <textarea {if isset($style[4])}{$style[4]}{/if} id="opiszahtjeva" name="opiszahtjeva" rows="2" cols="50">{if isset($opiszahtjeva)}{$opiszahtjeva}{/if}</textarea>

        <label for="donacije" style="display: block;"><b>Minimalni iznos donacije</b></>
            <input {if isset($style[5])}{$style[5]}{/if} id="miniznos" type="text" placeholder="Unesi iznos" name="miniznos" value="{if isset($miniznos)}{$miniznos}{/if}">

            <button class="posaljibtn" type="submit" name="submit" value="{if isset($stanje)}{$stanje}{/if}">{if isset($stanje)}{$stanje}{/if}</button>
    </div>
</form>
<div id="poruka" style="color: green">
    {if isset($poruka)}<p>{$poruka}</p>{/if}
</div>