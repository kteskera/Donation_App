<div class="sakrij2">
    <table class="pokusaj">
        <caption>Teme i sadržaj članaka</caption>
        <colgroup>
            <col style="width: 10%">
            <col style="width: 10%">
            <col style="width: 10%">

        </colgroup>
        <colgroup>
            <col style="width: 10%">
            <col style="width: 30%">
        </colgroup>
        <colgroup>
            <col style="width: 5%">
            <col style="width: 5%">
            <col style="width: 5%">
            <col style="width: 5%">
            <col style="width: 5%">
            <col style="width: 3%">
            <col style="width: 2%">
        </colgroup>
        <thead>
            <tr class="prvired">
                <td class="prvistupac" colspan="3">Podaci objave</td>
                <td class="prvistupac" colspan="9">Podaci članka</td>
            </tr>
            <tr class="probaPopis">
                <th class="stil">Url proizvođaća</th>
                <th class="stil">Datum i vrijeme</th>
                <th class="stil">Telefonski broj autora </th>
                <th class="stil">Naslov članka</th>
                <th class="stil">Text članka</th>
                <th class="stil">Tema članka</th>
                <th class="stil">Brand pametnog telefona</th>
                <th class="stil">Memorija uređaja</th>
                <th class="stil">Boja</th>
                <th class="stil">Slika</th>
                <th class="stil">Preporuka</th>
                <th class="stil">Uredi</th>
            </tr>
        </thead>
        <tbody>
            {if (isset($rezultat) && !isset($search_result))}
            {KreirajTablicu($rezultat)}
            {/if}
            {if (isset($search_result)) }
            {KreirajTablicu($search_result)}
            {/if}

        </tbody>
    </table>
</div>