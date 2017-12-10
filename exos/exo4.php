<?php
require_once '../inc/functions.php';

/*
 * Exo 4 : Inventaire
 *
 * Super !
 * Plus qu'à checker le matos !
 *
 * On prend chacun notre instrument et on l'accorde !
 *
 * Pour ça il faut écrire les classes ci dessous pour
 * retourner les bons textes des différentes fonctions
 *
 */

class Instrument
{
  // Nom de l'instrument = guitare, batterie, etc ...
  private $instrumentName;

  // Retourne le nom de l'instrument
  public function getInstrumentName()
  {
    return $this->instrumentName;
  }

  // Set le nom de l'instrument
  public function setInstrumentName($name)
  {
    $this->instrumentName = $name;
  }
}

class Musicien
{
  // nom du Musicien = Marc, Joe, etc ...
  // profession du Musicien = Guitariste, Batteur, etc ...
  // nom de l'instrument = guitare, batterie, etc ...
  public $name;
  public $profession;
  public $instrument;

  // Définie le nom et la profession d'un Musicien lors de l'instanciation
  public function __construct($name, $profession)
  {
    $this->name = $name;
    $this->profession = $profession;
  }

  // Récupère le nom de l'instrument
  public function prendInstrument($instrument)
  {
    $this->instrument = $instrument->getInstrumentName();
  }

  // Message résumant les 3 attributs composants un Musicien
  public function accordeInstrument()
  {
    if ($this->instrument === 'guitare') {
      $message = $this->name.' le '.$this->profession.' prend sa '.$this->instrument;
    }
    else {
      $message = $this->name.' accorde son instrument '.$this->instrument;
    }

    return $message;
  }
}

class Guitare extends Instrument
{
  // Défini le nom de l'instrument lors de l'instanciation
  public function __construct()
  {
    $this->setInstrumentName('guitare');
  }
}

class Batterie extends Instrument
{
  // Défini le nom de l'instrument lors de l'instanciation
  public function __construct()
  {
    $this->setInstrumentName('batterie');
  }
}

$guitare = new Guitare();
$marc = new Musicien('Marc', 'Guitariste');
$marc->prendInstrument($guitare);
$marc->accordeInstrument(); // => return "Marc le Guitariste prend sa guitare"

$batterie = new Batterie();
$joe = new Musicien('Joe', 'Batteur');
$joe->prendInstrument($batterie);
$joe->accordeInstrument(); // => return "Joe accorde son instrument batterie"


/*
 * Tests
 * Pas touche !
 */
displayExo(4, checkInstruments($marc, $joe));
