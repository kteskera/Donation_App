<div style="text-align:center;">

    <button id="popiszad" class="dropbtn"><i class="fa fa-tasks" aria-hidden="true"></i> Moji zadaci</button>
    <button id="popiszahtjeva" class="dropbtn"><i class="fa fa-list" aria-hidden="true"></i> Zahtjevi za sudjelovanje</button>
    <button id="dodajkomp" class="dropbtn"><i class="fa fa-briefcase" aria-hidden="true"></i> Kompetencije</button>
</div>
<hr class="new">
<div id="popiszadataka">
<h2 class="naslovTablice">Popis zadataka</h2>
    <table class="display" id="zadaci" style=" width: 85%;text-align: center;">
       
        <thead>
            <tr>
                <th class="stil">Naziv projekta</th>
                <th class="stil">Kategorija projekta</th>
                <th class="stil">Opis zadatka</th>
                <th class="stil">Datum početka</th>
                <th class="stil">Datum završetka</th>
                <th class="stil">Riješi zadatak</th>
                <th class="stil">Uredi riješenje</th>
            </tr>
        </thead>
        <tbody id="dodaj">
            {KreirajTablicuZadataka()}
        </tbody>
    </table>
</div>
<div id="popiszahtjevazasudjelovanje">
<h2 class="naslovTablice">Popis zahtjeva</h2>
    <table class="display" id="zahtjevi" style=" width: 85%;text-align: center;">
        
        <thead>
            <tr>
                <th class="stil">Naziv projekta</th>
                <th class="stil">Opis</th>
                <th class="stil">Datum zahtjeva</th>
                <th class="stil">Status</th>
                <th class="stil">Prihvati</th>
            </tr>
        </thead>
        <tbody id="dodaj">
            {KreirajTablicuZahtjeva()}
        </tbody>
    </table>

</div>
<div id="popiskompetencija">
    <a id="dodajkompetencije" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj kompetencije</a>
    <a id="prikazikompetencije" style="margin-left: 10px; cursor: pointer;"><i class="fa fa-list" aria-hidden="true"></i> Prikaži kompetencije</a>
    <br>
    <br>
    <div id="listakomp">
    <h2 class="naslovTablice">Popis kompetencija</h2>
        <table class="display" id="popiskompetencijatable" style=" width: 85%;text-align: center;">
    
            <thead>
                <tr>
                    <th class="stil">Naziv kompetencije</th>
                    <th class="stil">Datum odabira</th>
                    <th class="stil">Ukloni</th>
                </tr>
            </thead>
            <tbody id="dodaj">
                {DohvatiKompetencije()}
            </tbody>
        </table>
    </div>
    <div id="dodajkompeten">
        <form action="profil.php" method="POST">
            <div>
                <select id="selekcijakompetencija" name="selekcijakompetencija">
                    {KreirajPadajuciIzbornikKompetencija()}
                </select>
            </div>
            <button class="odaberitablicu" name="dodajkompetenciju" value="dodajkompetenciju" style="width:31%">Dodaj kompetenciju</button>
        </form>
    </div>
</div>