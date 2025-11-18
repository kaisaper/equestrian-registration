<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>unify - <?=$this->e($title)?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"> 
    <link href="styles/styles.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1><a href="<?=BASEURL?>">unify</a></h1>
      <div class=profile>
        <?php
          if (isset($_SESSION['user'])) {
            echo "<div>$_SESSION[user]</div>";
            echo "<div><a href='logout'>Kirjaudu ulos</a></div>";
            if (isset($_SESSION['admin']) && $_SESSION['admin']) {
              echo "<div><a href='admin'>Ylläpitosivut</a></div>";  
            }
          } else {
            echo "<div><a href='kirjaudu'>Kirjaudu</a></div>";
          }
        ?>
      </div>
    </header>
    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>unify by SuperDevelopers oü</div>
    </footer>
  </body>
  
</html>