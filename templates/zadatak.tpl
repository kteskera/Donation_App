<form method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            {if isset($poruka)}
                <p>{$poruka}</p>
            {/if}
        </div>
        <h1 class="naslov">{if isset($stanje)}{$stanje}{/if} zadatak</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color: red">
            {if isset($greske)}
                <p>{$greske}</p>
            {/if}
        </div>
        <hr>
        <label for="sadrzaj" style="display: block;"><b>Opis zadatka</b></label>
        <textarea {if isset($style[0])}{$style[0]}{/if} id="opiszadatka" name="opiszadatka" rows="2" cols="50">{if isset($opiszadatka)}{$opiszadatka}{/if}</textarea>

        <label for="naziv" style="display: block;"><b>Datum početka</b></label>
        <input {if isset($style[1])}{$style[1]}{/if} id="datumpocetka" type="datetime-local" placeholder="Unesi naslov" name="datumpocetka" value="{if isset($datumpocetka)}{$datumpocetka}{/if}">

        <label for="naziv" style="display: block;"><b>Zaduženi za zadatak</b>
            <div>
                <select class="korisnicizadatak" id="zadatakselection" name="selekcijakorisnika" >
                    {if isset($zastavica) && $zastavica == true}
                    {kreirajpadajucikorisnici()}{/if}
                    {if isset($zastavica) && $zastavica == false}
                        {if isset($selekcija)}{$selekcija}{/if}
                            {kreirajpadajucikorisnici2()}
                    {/if}
                </select>
            </div>
            <button class="posaljibtn" type="submit" name="submit" value="{if isset($stanje)}{$stanje}{/if}">{if isset($stanje)}{$stanje}{/if}</button>
    </div>
</form>
<div id="poruka" style="color: green">
    {if isset($poruka)}<p>{$poruka}</p>{/if}
</div>