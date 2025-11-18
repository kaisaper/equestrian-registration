<?php $this->layout('template', ['title' => 'Ylläpito']) ?>

<h1>Ylläpitosivut</h1>

<div class='ilmoittautumiset'>
<h2>Ilmoittautuneiden määrät</h2>

<?php

foreach ($tapahtumat as $tapahtuma) {

  $start = new DateTime($tapahtuma['alkaa']);
  $maaraTap = haeTapahtumaanIlmMaara($tapahtuma['idclass']); //onkohan ok ratkaisu... joka kierroksella tietokantahaku

  echo "<div>";
    echo "<div>$tapahtuma[idclass]</div>";
    echo "<div>$tapahtuma[nimi]</div>";
    echo "<div>$tapahtuma[luokka]</div>";
    echo "<div>" . $start->format('j.n. G:i')."</div>";
    echo "<div>Osallistujia: ".$maaraTap["ilmMaara"]."</div>";
    // echo "<div><a href='tapahtuma?id=" . $tapahtuma['idclass'] . "'>TIEDOT</a></div>";
  echo "</div>";

}

?>
</div>

<div class='ratsukot'>
<h2>Luokkiin ilmoittautuneet ratsukot</h2>

<?php
   foreach ($tapahtumat as $tapahtuma) {
          
          echo "<h3>** $tapahtuma[nimi] **</h3>";
          $ratsNimet = haeRatsukoidenNimet($tapahtuma['idclass']);
          foreach ($ratsNimet as $lahto) {
             echo "<div>$lahto[nimi] ja $lahto[horse]</div>";
            }
          }
?>
</div>


<div class='lisays'>
<h2>Lisää uusi luokka</h2> 

<form action="" method="POST">
  <div>
    <label for="laji">Laji:</label>
    <select name="laji" id="laji" value="<?= getValue($formdata2,'laji') ?>">
        <option value=""></option>
        <option value="koulu">KOULU</option>
        <option value="este">ESTE</option>
        <option value="maasto">MAASTO</option>
    </select>
    <div class="error"><?= getValue($error,'laji'); ?></div>
  </div>
  <div>
    <label for="nimi">Luokan nimi:</label>
    <input id="nimi" type="text" name="nimi" value="<?= getValue($formdata2,'nimi') ?>">
    <div class="error"><?= getValue($error,'nimi'); ?></div>
  </div>  
  <div>
    <label for="luokka">Luokka (estekorkeus tai ohjelma):</label>
    <input type="text" name="luokka" value="<?= getValue($formdata2,'luokka') ?>">
    <div class="error"><?= getValue($error,'luokka'); ?></div>
  </div>
  <div>
    <label for="alkaa">Alkamisajankohta (muodossa 2026-12-31 12:30):</label>
    <input type="text" name="alkaa" value="<?= getValue($formdata2,'alkaa') ?>">
    <div class="error"><?= getValue($error,'alkaa'); ?></div>
  </div>
  <div>
    <label for="kuvaus">Tietoja:</label>
    <textarea id ="kuvaus" name="kuvaus" rows="6" value="<?= getValue($formdata2,'kuvaus') ?>"></textarea>
    <div class="error"><?= getValue($error,'kuvaus'); ?></div>
  </div>
  <div>
    <input type="submit" name="laheta" value="LISÄÄ">
  </div>
</form>
</div>

<div class="poisto">
<h2>Poista luokka</h2>
<p> Voit poistaa luokan, jossa ei ole osallistujia.</p>
<div>
<form action="" method="POST">
  <label for="poistoid">Anna poistettavan luokan tunnus (id)</label><br>
  <input type="text" name="poistoid">
  <input type="submit" name="poista" value="POISTA LUOKKA">
</form>
</div>
</div>
