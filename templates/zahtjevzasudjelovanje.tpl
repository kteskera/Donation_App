<form method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            {if isset($poruka)}
                <p>{$poruka}</p>
            {/if}
        </div>
        <h1 class="naslov">Pošalji zahtjev za sudjelovanje</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color: red">
            {if isset($greske)}
                <p>{$greske}</p>
            {/if}
        </div>
        <hr>
        <label for="projekt" style="display: block;"><b>Popis projekata</b></label>
        <select id="projekt" name="projekt" {if isset($style[0])}{$style[0]}{/if}>
        <option value='0'>Odaberi projekt</option>
        {KreirajPadajuciIzbornik2()}
    </select>

        <label for="projekt" style="display: block;"><b>Opis zahtjeva</b></label>
        <textarea {if isset($style[1])}{$style[1]}{/if} id="opiszahtjeva" name="opiszahtjeva" rows="2" cols="50">{if isset($opiszadatka)}{$opiszadatka}{/if}</textarea>

            <button class="posaljibtn" type="submit" name="submit" value="Pošalji">Pošalji</button>
    </div>
</form>
<div id="poruka" style="color: green">
    {if isset($poruka)}<p>{$poruka}</p>{/if}
</div>