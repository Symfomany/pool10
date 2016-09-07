<?php
/**
*
*/
abstract class AbstractAnimal  implements ActionsInterface{

  protected $yeux;
  protected $vertebres;


  public function dormir($nbJour){
      return "Je dors sur/sous terre pendant {$nbJour} jours...";
  }

  public function marcher(){

    return "Je marche/remper sur la sous/terre";
  }


  abstract function manger(AbstractAnimal $animal);

  public function respire(){
    // je respire avec mes poumons

  }



}







 ?>
