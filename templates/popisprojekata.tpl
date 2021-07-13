<a id="kreirajproj" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i> Kreiraj novi projekt</a>
<a id="prikaziproj" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-list" aria-hidden="true"></i> Prikaži projekte</a>
<hr class="new">
<div id="sakrij2" style="text-align: left; margin-left: 15px;">
    <h2 class="naslov">Odaberi kategoriju projekta</h2>
    <hr class="new">
    <div style="display: inline;">
        <div>
            <select id="selekcijakategorije" name="selekcijakategorije">
            <option>--Odaberi kategoriju--</option>
                {KreirajPadajuciIzbornik()}
            </select>
        </div>
    </div>
    <div id="sakrijsveprojekte">
    <h2 class="naslovTablice">Popis projekata</h2>
        <table class="display" id="odabranakategorija" style=" width: 85%;text-align: center;">
            <thead>
                <tr>
                    <th class="stil">Naziv</th>
                    <th class="stil">Akronim</th>
                    <th class="stil">Datum početka</th>
                    <th class="stil">Datum završetka</th>
                    <th class="stil">Opis zahtjeva</th>
                    <th class="stil">Minimalni iznos donacija</th>
                    <th class="stil">Trenutni iznos donacija</th>
                    
                    <th class="stil">Uredi</th>
                    <th class="stil">Obriši</th>
                    <th class="stil">Stanje</th>
                </tr>
            </thead>
            <tbody id="dodaj">
            </tbody>
        </table>
    </div>
</div>
<div id="sakrijkreiranje" style="text-align: left; margin-left: 15px;">
    <h2 class="naslov">Odaberi kategoriju za koju se kreira projekt</h2>
    <hr class="new">
    <form action="projekt.php" method="GET">
        <div>
            <select id="selekcijakategorije" name="selekcijakategorije">
                {KreirajPadajuciIzbornik()}
            </select>
        </div>
        <button class="odaberitablicu" name="kreirajprojekt" style="width:31%">Odaberi kategoriju</button>
    </form>
</div>