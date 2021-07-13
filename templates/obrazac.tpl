<form method="POST" enctype="multipart/form-data"  novalidate>
    <div class="container">
        <div id="porukaDodavanja" style="color: green">
            {if isset($poruka)}
                <p>{$poruka}</p>
            {/if}
        </div>
        <h1 class="naslov">Kreiraj objavu</h1>
        <p>Popuni formu kako bi kreirao objavu.</p>
        <div id="greske" style="color: red">
            {if isset($greske)}
                <p>{$greske}</p>
            {/if}
        </div>
        <hr>
        <label for="url"><b>URL</b></label>
        <input {if isset($style[0])}{$style[0]}{/if} id="url" type="url" placeholder="Unesi url" name="url" value="{if isset($url)}{$url}{/if}">

        <label for="datum"><b>Datum</b></label>
        <input {if isset($style[1])}{$style[1]}{/if} id="datum" type="datetime-local" name="datum" value="{if isset($datum)}{$datum}{/if}">

        <label for="telefon" style="display: block;"><b>Telefonski broj</b></label>
        <input {if isset($style[2])}{$style[2]}{/if} id="telefon" type="tel" placeholder="Unesi broj telefona" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" value="{if isset($telefon)}{$telefon}{/if}" name="telefon">
        <hr class="new">
        <h1 class="naslov">Sadržaj</h1>
        <p>Popuni ostatak forme za sadržaj i dizajn članka.</p>
        <hr class="new">

        <label for="naslov" style="display: block;"><b>Naslov članka</b></label>
        <input {if isset($style[3])}{$style[3]}{/if} id="naslov" type="text" placeholder="Unesi naslov" name="naslov" value="{if isset($naslov)}{$naslov}{/if}">

        <label for="sadrzaj" style="display: block;"><b>Text članka</b></label>
        <textarea {if isset($style[4])}{$style[4]}{/if} id="sadrzaj" name="sadrzaj" rows="2" cols="50">{if isset($text)}{$text}{/if}</textarea>

        <label style="display: block;"><b>Tema članka</b></label>

        <div {if isset($style[5])}{$style[5]}{/if}>
            <label><b class="c">Recenzija <input type="checkbox" name="recenzija" value="Recenzija" {if isset($checked)}{if (strpos({$checked}, 'Recenzija' ) || startsWith({$checked}, "Recenzija" ))}checked{/if}{/if}{if not empty({$inicijalna2})}{$inicijalna2}{/if}></b></label>

            <label><b class="c">Novosti <input type="checkbox" name="novost" value="Novost" {if isset($checked)}{if (strpos({$checked}, 'Novost' ) || startsWith({$checked}, "Novost" ))}checked{/if}{/if}{if not empty({$inicijalna2})}{$inicijalna2}{/if}></b></label>

            <label><b class="c">Leaks <input type="checkbox" name="leaks" value="Leaks" {if isset($checked)}{if (strpos({$checked}, 'Leaks' ) || startsWith({$checked}, "Leaks" ))}checked{/if}{/if}></b></label>
            <label><b class="c">Usporedba <input type="checkbox" name="usporedba" value="Usporedba" {if isset($checked)}{if (strpos({$checked}, 'Usporedba' ) || startsWith({$checked}, "Usporedba" ))}checked{/if}{/if}></b></label>

            <label><b class="c">Software <input type="checkbox" name="software" value="Software" {if isset($checked)}{if (strpos({$checked}, 'Softwate' ) || startsWith({$checked}, "Software" ))}checked{/if}{/if}></b></label>

            <label><b class="c">Hardware <input type="checkbox" name="hardware" value="Hardware" {if isset($checked)}{if (strpos({$checked}, 'Hardware' ) || startsWith({$checked}, "Hardware" ))}checked{/if}{/if}></b></label>

            <label><b class="c">Ostalo <input type="checkbox" name="ostalo" value="Ostalo" {if isset($checked)}{if (strpos({$checked}, 'Ostalo' ) || startsWith({$checked}, "Ostalo" ))}checked{/if}{/if}></b></label></div>


        <label for="modeli"><b>Odaberi brand pametnog telefona</b></label>
        <div {if isset($style[6])}{$style[6]}{/if}><select id="modeli" class="select-checkbox" name="modeli[]" multiple>

                <option value="Apple" {if isset($checked)}{if (strpos({$selected}, "Apple" ) || startsWith({$selected}, "Apple" ))}selected{/if}{/if}>Apple</option>
                <option value="Samsung" {if isset($checked)}{if (strpos({$selected}, "Samsung" ) || startsWith({$selected}, "Samsung" ))}selected{/if}{/if}{if not empty({$inicijalna})}{$inicijalna}{/if}>Samsung</option>
                <option value="Huawei" {if isset($checked)}{if (strpos({$selected}, "Huawei" ) || startsWith({$selected}, "Huawei" ))}selected{/if}{/if}{if not empty({$inicijalna})}{$inicijalna}{/if}>Huawei</option>
                <option value="Xiaomi" {if isset($checked)}{if (strpos({$selected}, "Xiaomi" ) || startsWith({$selected}, "Xiaomi" ))}selected{/if}{/if}>Xiaomi</option>
                <option value="Oppo" {if isset($checked)}{if (strpos({$selected}, "Oppo" ) || startsWith({$selected}, "Oppo" ))}selected{/if}{/if}>Oppo</option>
                <option value="Sony" {if isset($checked)}{if (strpos({$selected}, "Sony" ) || startsWith({$selected}, "Sony" ))}selected{/if}{/if}>Sony</option>
                <option value="Alcatel" {if isset($checked)}{if (strpos({$selected}, "Alcatel" ) || startsWith({$selected}, "Alcatel" ))}selected{/if}{/if}>Alcatel</option>
                <option value="LG" {if isset($checked)}{if (strpos({$selected}, "LG" ) || startsWith({$selected}, "LG" ))}selected{/if}{/if}>LG</option>

            </select>
        </div>

        <label for="rate1" style="display:block;"><b>Slobodna memorija uređaja (GB)</b></label>
        <div {if isset($style[7])}{$style[7]}{/if}>
            <input id="rate1" type="range" list="tickmarks" name="memorija" min="32" max="512" value="{if isset({$memorija})}{$memorija}{/if}{if empty({$memorija})}{32}{/if}" onchange="javascript:document.getElementById('rateValue1').value = document.getElementById('rate1').value;">

            <input id="rateValue1" name="output" type="text" style="padding: 15px; margin: 0px 0px 28px 0px; display: block;
                                                                                              border: none;background: #ebe8e8; text-align: center;" size="2" value="{if isset({$memorija})}{$memorija}{/if}{if empty({$memorija})}{32}{/if}" />
            <datalist id="tickmarks">
                <option value="32"></option>
                <option value="64"></option>
                <option value="128"></option>
                <option value="256"></option>
                <option value="512"></option>
            </datalist>
        </div>

        <label for="boja" style="display: block;"><b>Odaberi boju</b></label>
        <input {if isset($style[8])}{$style[8]}{/if} id="boja" type="color" name="boja" value="{if isset({$boja})}{$boja}{/if}">


        <label for="dodajsliku" style="display:block;"><b>Dodaj sliku</b></label>
        <input {if isset($style[9])}{$style[9]}{/if} id="dodajsliku" type="file" accept="image/png, image/jpeg, image/jpg" name="dodajsliku">

        <div {if isset($style[10])}{$style[10]}{/if}>
            <label style="display:block; margin-bottom: 10px;"><b>Preporuka proizvoda</b></label>
            <label><b class="d">Da<input type="radio" name="preporuka" value="DA" {if isset($preporuka)}{if ({$preporuka}==="DA" )}checked{/if}{/if}></b></label>
            <label><b class="d">Ne<input type="radio" name="preporuka" value="NE" {if isset($preporuka)}{if ({$preporuka}==="NE" )}checked{/if}{/if}></b></label>
            <label style="display:block; margin-bottom: 10px;"></label>
        </div>
        <button class="posaljibtn" type="submit" name="submit" value="kreiraj">Kreiraj</button>
    </div>
</form>
<div id="poruka" style="color: green">
    {if isset($poruka)}<p>{$poruka}</p>{/if}
</div>