
<?php $this->layout('template', ['title' => $tapahtuma['nimi']]) ?>

<?php
  $start = new DateTime($tapahtuma['alkaa']);
?>

<h1><?=$tapahtuma['nimi']?></h1>
<div><?=$tapahtuma['kuvaus']?></div>
<div>Alkaa: <?=$start->format('j.n.Y G:i')?></div>


<?php
if ($loggeduser) {
    if (!$ilmoittautuminen) {
      //echo "<div class='flexarea'><a href='ilmoittaudu?id=$tapahtuma[idtapahtuma]' class='button'>ILMOITTAUDU</a></div>"; 
      echo  "<div class='flexarea'><a href='hevonen?id=$tapahtuma[idclass]' class='button'>ILMOITTAUTUMINEN</a></div>";   
    } else {
      echo "<div class='flexarea'>";
      echo "<div>Olet ilmoittautunut tapahtumaan!</div>";
      echo "<a href='peru?id=$tapahtuma[idclass]' class='button'>PERU ILMOITTAUTUMINEN</a>";
      echo "</div>";
    }
  }
?>




