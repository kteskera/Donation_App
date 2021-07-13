<div style="text-align:center;">
    <button id="odaberikategorije" class="odaberitablicu"><i class="fa fa-list" aria-hidden="true"></i> Kategorije</button>
    <button id="odaberiprojekte" class="odaberitablicu"><i class="fa fa-list" aria-hidden="true"></i> Projekti</button>
</div>
<div class="sakrij2">
    <div id="sakrijkategorije">
        <h2 class="naslovTablice">Kategorije projekata</h2>
        <table id="popiskategorija" class="display" style="width: 50%; text-align: center;">
            <thead>
                <tr>
                    <th class="stil">Naziv kategorije</th>
                    <th class="stil">Broj projekata</th>
                    <th class="stil">Video projekata</th>
                </tr>
            </thead>
            <tbody id="dodaj">
                {if (isset($result))}
                    {KreirajTablicu($result)}
                {/if}
            </tbody>
        </table>
    </div>

    <div id="sakrijprojekte" style="text-align: center;">
        <h2 class="naslovTablice">Popis projekata</h2>
        <button id="toogle" class="odaberitablicu"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
        <div id="filterdiv" style="text-align: center;" >

            <fieldset id="filterfild"  style="border: 2px solid #dad7d7f3;  margin-left: 100px;margin-right: 100px;">
            <label for="date"><b>Datum početka</b></label>
            <input style="width: 15%;" type="date" id="date" name="date">
            <label for="date"><b>Datum završetka</b></label>
            <input style="width: 15%;" type="date" id="dodate" name="dodate">
            <br>

            <button id="filter" class="odaberitablicu">Filtriraj</button>
            <button id="ponisti" class="odaberitablicu">Poništi filter</button>
            </fieldset>
            
            <div id="sakrijfilt">
            <hr class="new">
                <table id="popisprojekatafilt" class="display" style=" width: 85%;text-align: center;">
                    <thead>
                        <tr>
                            <th class="stil">Naziv</th>
                            <th class="stil">Akronim</th>
                            <th class="stil">Naziv kategorije</th>
                            <th class="stil">Datum početka</th>
                            <th class="stil">Datum završetka</th>
                            <th class="stil">Opis zahtjeva</th>
                            <th class="stil">Minimalni iznos donacija</th>
                            <th class="stil">Trenutni iznos donacija</th>
                        </tr>
                    </thead>
                    <tbody id="dodaj">

                    </tbody>
                </table>
            </div>
        </div>
        <hr class="new">
        <div id="sakrijproj">
            <table id="popisprojekata" class="display" style=" width: 85%;text-align: center;">
                <thead>
                    <tr>
                        <th class="stil">Naziv</th>
                        <th class="stil">Akronim</th>
                        <th class="stil">Kategorija projekta</th>
                        <th class="stil">Datum početka</th>
                        <th class="stil">Datum završetka</th>
                        <th class="stil">Opis zahtjeva</th>
                        <th class="stil">Minimalni iznos donacija</th>
                        <th class="stil">Trenutni iznos donacija</th>
                    </tr>
                </thead>
                <tbody id="dodaj">
                    {if (isset($result2))}
                        {KreirajTablicu2($result2)}
                    {/if}
                </tbody>
            </table>
        </div>
    </div>
</div>