<div style="margin-left: 15px;">
<h2 class="naslov">Odaberi kategoriju projekta</h2>
<hr class="new">
<div style="display: inline;">
    <div>
        <select id="selekcijakategorije" name="selekcijakategorije">
        echo "<option>--Odaberi kategoriju--</option>";
        {KreirajList()}
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
                <th class="stil">Doniraj</th>
            </tr>
        </thead>
        <tbody id="dodaj">
        </tbody>
    </table>
</div>

</div>