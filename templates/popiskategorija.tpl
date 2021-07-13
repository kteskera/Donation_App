<a id="kreirajkat" style="cursor: pointer; margin-left:10px"><i class="fa fa-plus" aria-hidden="true"></i> Kreiraj novu kategoriju</a>
<a id="prikazikat" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-list" aria-hidden="true"></i> Prikaži kategorije</a>
<hr class="new">
<div id="sakrij1">
<h2 class="naslovTablice">Kategorije projekata i zaduženi moderatori</h2>
    <table id="tablicakategorija" class="display" style="width: 50%; text-align: center;">
        <thead>
            <tr>
                <th class="stil">Naziv kategorije</th>
                <th class="stil">Obriši kategoriju</th>
                <th class="stil">Moderatori</th>
                <th class="stil">Dodaj/obriši moderatora</th>
            </tr>
        </thead>
        <tbody id="dodaj">
            {if (isset($result))}
                {KreirajTablicu($result)}
            {/if}
        </tbody>
    </table>
</div>
<div id="kreirajkatdiv" style="text-align: left; margin-left: 15px;">
    
    <h2 class="naslov">Kreiraj kategoriju</h2>
    <hr class="new">
    <form id="pokusaj" method="POST">
    <br>
        <label for="naslov" style="display: block;"><b>Naziv kategorije</b></label>
        <input id="kreirajkatinput" style="width:20.5%;display: block;" type="text" placeholder="Unesi naziv kategorije" name="nazivkat">
        <div id="greske" style="color: red; margin-left: 5px;"></div>
        <button id="btnkreirajkat" class="odaberitablicu" name="kreirajkatbtn" value="kreirajkatbtn" style="width:20.45%">Kreiraj kategoriju</button>
    </form>
</div>