<div style="text-align:Left;">
<p>Jeste li sigurni da želite obrisati?
<br>
{if (isset($napomena))}
    {$napomena}
{/if}
</p>
<form method="POST">
    <button id="da" name="da" class="odaberitablicu" style="width:8%;">Da</button>
    <button id="ne" name="ne" class="odaberitablicu" style="width:8%;">Ne</button>
<form>
</div>