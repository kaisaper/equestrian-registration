<?php $this->layout('template', ['title' => 'Omat ilmoittautumiset']) ?>


<h1>Omat ilmoittautumiset</h1>

<div class='omat_ilmoittautumiset'>

<?php

foreach ($omat_tap as $tapahtuma) {

  $start = new DateTime($tapahtuma['alkaa']);
  //$end = new DateTime($tapahtuma['tap_loppuu']);

  echo "<div>";
    echo "<div>$tapahtuma[laji]</div>";
    echo "<div>$tapahtuma[nimi]</div>";
    echo "<div>$tapahtuma[luokka]</div>";
    echo "<div>" . $start->format('j.n. G:i') . "</div>";
    echo "<div><a href='tapahtuma?id=" . $tapahtuma['idclass'] . "'>TIEDOT</a></div>";
  echo "</div>";

}

?>
</div>
<div class='info'>
<p>Jos haluat ilmoittautua samaan luokkaan kahdella tai useammalla eri hevosella, 
  ota yhteyttä kilpailujärjestäjään.</p>
</div>


