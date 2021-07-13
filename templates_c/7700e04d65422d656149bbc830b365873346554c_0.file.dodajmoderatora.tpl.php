<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 13:50:57
  from 'C:\xampp\htdocs\zadaca_04\templates\dodajmoderatora.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee0c921379900_28027044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7700e04d65422d656149bbc830b365873346554c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\zadaca_04\\templates\\dodajmoderatora.tpl',
      1 => 1591017258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0c921379900_28027044 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="margin-left: 15px;">
<form method="POST" novalidate>
    <h1 class="naslov">Dodaj moderatora 
 </h1>
    <p>Trenutna kategorija: <?php echo DohvatiNaslov();?>
</p>
    <div>
        <select style="float: center;" name="selekcija">
                <?php echo GenerirajComboBox();?>

        </select>
    </div>
    <button class="spremiodabir" name="spremiodabir">Dodaj moderatora</button>
    </form>
    <hr class="new">
    <form method="POST" novalidate>
    <h1 class="naslov">Obriši moderatora</h1>
    <p>Trenutna kategorija: <?php echo DohvatiNaslov();?>

    </p>
    <div >
        <select style="float: center;" name="selekcija2">
            <?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
                <?php echo KreirajPopis($_smarty_tpl->tpl_vars['result']->value);?>

            <?php }?>
        </select>
    </div>
    <button class="spremiodabir" name="obrisi">Obriši moderatora</button>
    </form>
    <div>
    </div>
</div>

<?php }
}
