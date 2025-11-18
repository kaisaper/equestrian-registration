<?php $this->layout('template', ['title' => 'Ilmoittaudu luokkaan']) ?>

<h1>Luokkaan ilmoittautuminen</h1>
<?php

echo "Olet ilmoittautumassa luokkaan $tapahtuma[nimi] <br>"; 
echo "ratsastajan  nimellä $loggeduser[nimi]. <br><br>";
echo "Anna hevosen nimi";
?>
<form action="" method="POST">
    <label for="horse">Hevosen nimi:</label>
    <input type="text" name="horse" required>
  <div>
    <input type="submit" name="laheta" value="ILMOITTAUDU">
  </div>
</form>

