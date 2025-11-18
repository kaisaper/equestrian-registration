
<?php $this->layout('template', ['title' => 'Kilpailuluokat']) ?>

<h1>Kilpailuluokat ** kesä 2026 **</h1>

<div class='tapahtumat'>
<?php

foreach ($tapahtumat as $tapahtuma) {

  $start = new DateTime($tapahtuma['alkaa']);
  
  echo "<div>";
    echo "<div>$tapahtuma[laji]</div>";
    echo "<div>$tapahtuma[nimi]</div>";
    echo "<div>$tapahtuma[luokka]</div>";
    // echo "<div>" . $start->format('j.n.Y') . "-" . $end->format('j.n.Y') . "</div>";
    echo "<div>" . $start->format('j.n. G:i') . "</div>";
    echo "<div><a href='tapahtuma?id=" . $tapahtuma['idclass'] . "'>TIEDOT</a></div>";
  echo "</div>";

}

?>
</div>
<br>
<div class='ilmoittautumiset'>

<?php
echo "Ilmoittautuneita ratsukoita yhteensä: ". $ilmKmaara['maara'];
?>
<br>
<br>
<p><a href='omat_ilmoittautumiset'>OMAT ILMOITTAUTUMISET</a><p>
</div>


