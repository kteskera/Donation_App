<form method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            {if isset($poruka)}
                <p>{$poruka}</p>
            {/if}
        </div>
        <h1 class="naslov">Riješi zadatak</h1>
        <p>Popuni formu.</p>
        <div id="greske" style="color: red">
            {if isset($greske)}
                <p>{$greske}</p>
            {/if}
        </div>
        <hr>
        <label for="sadrzaj" style="display: block;"><b>Naziv videa</b></label>
        <input type="text" {if isset($style[0])}{$style[0]}{/if} id="nazivvidea" name="nazivvidea" placeholder="Unesi naziv" value="{if isset($nazivvidea)}{$nazivvidea}{/if}">

        {if ($provjera)}
        {if isset($nesto)}{$nesto}{/if}
        {/if}    

        <label style="display:block; margin-bottom: 10px;"><b>Postaviti javno</b></label>
        <label><b class="d">Da<input type="radio" name="vidljivost" value="1" {if isset($vidljivost2)}{if ({$vidljivost2}==="1" )}checked{/if}{/if}></b></label>
        <label><b class="d">Ne<input type="radio" name="vidljivost" value="0" {if isset($vidljivost2)}{if ({$vidljivost2}==="0" )}checked{/if}{/if}></b></label>
        <hr class="new">
        <button class="posaljibtn" type="submit" name="submit" value="Pošalji">Pošalji</button>
    </div>
</form>
<div id="poruka" style="color: green">
    {if isset($poruka)}<p>{$poruka}</p>{/if}
</div>