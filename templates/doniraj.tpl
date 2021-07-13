<form id="donirajform" method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            {if isset($poruka)}
                <p>{$poruka}</p>
            {/if}
        </div>
        <h1 class="naslov">Doniraj sredstva</h1>
        <p>Unesi iznos.</p>

        <hr>
        <label for="iznos" style="display: block;"><b>Iznos donacije</b></label>
        <input type="text" id="iznos" name="iznos" placeholder="Unesi iznos" {if isset($style)}{$style}{/if}>
        <div id="greske" style="color: red">
            {if isset($greske)}
                <p>{$greske}</p>
            {/if}
        </div>
        <button class="posaljibtn" type="submit" name="submit" value="Pošalji">Doniraj</button>
    </div>
</form>