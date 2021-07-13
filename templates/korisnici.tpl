<div style="margin-left: 15px;">
<div>
<h2 class="naslov">Odaberi kompetenciju kako bi se prikazali korisnici</h2>
    <select id="kompentencije" name="kompentencije">
        <option value='0'>Odaberi kompentenciju korisnika</option>
        {KreirajPadajuciIzbornik()}
    </select>
</div>
<div id="sakrijtab">
<h2 class="naslovTablice">Korisnici</h2>
<table class="display" id="korisnicikompetencije" style=" width: 85%;text-align: center;">
            <thead>
                <tr>
                    <th class="stil">Ime</th>
                    <th class="stil">Prezime</th>
                    <th class="stil">Korisničko ime</th>
                    <th class="stil">Pošalji zahtjev za sudjelovanje</th>
                </tr>
            </thead>
            <tbody id="dodaj">
            </tbody>
        </table>
        </div>
</div>