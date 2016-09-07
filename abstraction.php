<?php

require "abstract/ActionsInterface.php";
require "abstract/AbstractAnimal.php";
require "src/FormattageTrait.php";
require "abstract/Herbivore.php";
require "abstract/Carnivore.php";
require "abstract/Humain.php";


// $bulbizarre = new Herbivore();
// $dracofeu = new Carnivore();

$bulbizarre = new Herbivore();
$mathias = new Humain();

var_dump($mathias->dormir("<i>15</i>"));
var_dump($mathias->traitement("  <b>mathias</b>"));
var_dump($bulbizarre->dormir(15));




 ?>
