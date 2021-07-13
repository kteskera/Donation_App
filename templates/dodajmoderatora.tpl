<div style="margin-left: 15px;">
<form method="POST" novalidate>
    <h1 class="naslov">Dodaj moderatora 
 </h1>
    <p>Trenutna kategorija: {DohvatiNaslov()}</p>
    <div>
        <select style="float: center;" name="selekcija">
                {GenerirajComboBox()}
        </select>
    </div>
    <button class="spremiodabir" name="spremiodabir">Dodaj moderatora</button>
    </form>
    <hr class="new">
    <form method="POST" novalidate>
    <h1 class="naslov">Obriši moderatora</h1>
    <p>Trenutna kategorija: {DohvatiNaslov()}
    </p>
    <div >
        <select style="float: center;" name="selekcija2">
            {if (isset($result))}
                {KreirajPopis($result)}
            {/if}
        </select>
    </div>
    <button class="spremiodabir" name="obrisi">Obriši moderatora</button>
    </form>
    <div>
    </div>
</div>

