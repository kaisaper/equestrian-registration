<?php

function tarkistaJaLisaaLuokka($formdata2){

  // Tuodaan tapahtuma-mallin funktiot, joilla voidaan lisätä
  // kilpailuluokan tiedot tietokantaan.
  require_once(MODEL_DIR . 'tapahtuma.php');

  // Alustetaan virhetaulukko, joka palautetaan lopuksi joko
  // tyhjänä tai virheillä täytettynä.
  $error = [];

  // Seuraavaksi tehdään lomaketietojen tarkistus. Tarkistusten
  // periaate on jokaisessa kohdassa sama. Jos kentän arvo
  // ei täytä tarkistuksen ehtoja, niin error-taulukkoon
  // lisätään virhekuvaus. Lopussa error-taulukko on tyhjä, jos
  // kaikki kentät menivät tarkistuksesta lävitse.

  // Tarkistetaan onko nimi määritelty ja se täyttää mallin.
  if (!isset($formdata2['laji']) || !$formdata2['laji']) {
    $error['laji'] = "Valitse laji.";
  }  
  if (!isset($formdata2['nimi']) || !$formdata2['nimi']) {
    $error['nimi'] = "Anna luokan nimi.";
  } else {
    if (!preg_match("/^[- '\p{L}]+$/u", $formdata2["nimi"])) {
      $error['nimi'] = "Syötä luokan nimi ilman erikoismerkkejä.";
    }
  }    
  if (!isset($formdata2['luokka']) || !$formdata2['luokka']) {
    $error['luokka'] = "Anna luokan arvostelu tai estekorkeus.";
  } else {
    if (!preg_match("/^[-. \p{L}\p{N}]+$/u", $formdata2["luokka"])) {
      $error['luokka'] = "Syötä luokan arvostelu tai estekorkeus ilman erikoismerkkejä.";
    }
  }
  if (!isset($formdata2['kuvaus']) || !$formdata2['kuvaus']) {
    $error['kuvaus'] = "Anna luokalle kuvaus.";
  } else {
    if (!preg_match("/^[-.! '\p{L}\p{N}]+$/u", $formdata2["kuvaus"])) {
      $error['kuvaus'] = "Syötä luokan kuvaus ilman erikoismerkkejä.";
    }
  }
  if (!isset($formdata2['alkaa']) || !$formdata2['alkaa']) {
    $error['alkaa'] = "Anna luokan alkamisajankohta.";
  } else {
    if (!preg_match("/^\d{4}-\d{1,2}-\d{1,2}[ T]\d{1,2}:\d{1,2}$/u", $formdata2["alkaa"])) {
      $error['alkaa'] = "Anna luokan alkamisajankohta muodossa 2026-12-31 12:30.";
    }
  }  

  // Lisätään tiedot tietokantaan, jos edellä syötettyissä
  // tiedoissa ei ollut virheitä eli error-taulukosta ei
  // löydy virhetekstejä.
  if (!$error) {

    // Haetaan lomakkeen tiedot omiin muuttujiinsa.
    $nimi = $formdata2['nimi'];
    $luokka = $formdata2['luokka'];
    $kuvaus = $formdata2['kuvaus'];
    $alkaa = $formdata2['alkaa'];
    $laji=strtoupper($formdata2['laji']);
    
    // Lisätään tapahtuma (kilpailuokka) tietokantaan. Jos lisäys onnistui,
    // tulee palautusarvona lisätyn luokan id-tunniste.
    $idclass = lisaaTapahtuma($nimi,$luokka,$kuvaus,$alkaa,$laji);

    // Palautetaan JSON-tyyppinen taulukko, jossa:
    //  status   = Koodi, joka kertoo lisäyksen onnistumisen.
    //             Hyvin samankaltainen kuin HTTP-protokollan
    //             vastauskoodi.
    //             200 = OK
    //             400 = Bad Request
    //             500 = Internal Server Error
    //  id       = Lisätyn rivin id-tunniste.
    //  formdata = Lisättävän henkilön lomakedata. Sama, mitä
    //             annettiin syötteenä.
    //  error    = Taulukko, jossa on lomaketarkistuksessa
    //             esille tulleet virheet.

    // Tarkistetaan onnistuiko luokan tietojen lisääminen.
    // Jos idclass-muuttujassa on positiivinen arvo,
    // onnistui rivin lisääminen. Muuten lisäämisessä ilmeni
    // ongelma.

    if ($idclass) {
       return [
          "status" => 200,
          "id"     => $idclass,
          "data"   => $formdata2
        ]; 
    }
    else {
        return [
          "status" => 500,
          "data"   => $formdata2
        ];
    }

 } else {
    // Lomaketietojen tarkistuksessa ilmeni virheitä.
    return [
      "status" => 400,
      "data"   => $formdata2,
      "error" => $error
    ];
}

}

?>