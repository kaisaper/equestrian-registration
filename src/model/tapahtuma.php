<?php

  require_once HELPERS_DIR . 'DB.php';

  function haeTapahtumat() {
    return DB::run('SELECT * FROM class ORDER BY alkaa;')->fetchAll();
  }

  function haeTapahtuma($id) {
    return DB::run('SELECT * FROM class WHERE idclass = ?;',[$id])->fetch();
  }

  function haeHlonTapahtumat($id) {
    return DB::run('SELECT * FROM class c INNER JOIN reg r ON c.idclass = r.idclass
    WHERE r.idrider = ?;',[$id])->fetchAll();
  }

  function lisaaTapahtuma($nimi,$luokka,$kuvaus,$alkaa,$laji) {
    DB::run('INSERT INTO class (nimi, luokka, kuvaus, alkaa, laji) VALUES (?,?,?,?,?)',[$nimi,$luokka,$kuvaus,$alkaa,$laji]);
    return DB::lastInsertId();
  }

  function poistaTapahtuma($id) {
    DB::run('DELETE FROM class WHERE idclass = ?',[$id])->rowCount();
  }
  
?>