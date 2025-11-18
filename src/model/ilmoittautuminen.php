<?php

  require_once HELPERS_DIR . 'DB.php';

  function haeIlmoittautuminen($idrider,$idclass) {
    return DB::run('SELECT * FROM reg WHERE idrider = ? AND idclass = ?',
                   [$idrider, $idclass])->fetchAll();
  }

  function haeTapahtumaanIlmMaara($id) {
    return DB::run('SELECT COUNT(idreg) AS ilmMaara FROM reg WHERE idclass = ?;',[$id])->fetch();
  }//käy ratsukoiden määrästä
  
  function haeRatsukoidenNimet($idclass) {
    return DB::run('SELECT r.nimi, g.horse, g.idclass, c.nimi AS luokannimi, c.luokka FROM rider r 
      INNER JOIN reg g ON r.idrider = g.idrider
      INNER JOIN class c ON c.idclass = g.idclass
      WHERE g.idclass = ?;',[$idclass])->fetchAll();
  }

  function haeIlmoittautuneidenMaara() {
    return DB::run('SELECT COUNT(idreg) AS maara FROM reg;')->fetch();
  } //ratsukoiden määrä

  function lisaaIlmoittautuminen($idrider,$idclass,$horse) {
    DB::run('INSERT INTO reg (idrider, idclass, horse) VALUE (?,?,?)',
            [$idrider, $idclass, $horse]);
    return DB::lastInsertId();
  }

  function poistaIlmoittautuminen($idrider, $idclass) {
    return DB::run('DELETE FROM reg  WHERE idrider = ? AND idclass = ?',
                   [$idrider, $idclass])->rowCount();
  }

?>