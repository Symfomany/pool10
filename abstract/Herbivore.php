<?php
/**
 *
 */
class Herbivore extends AbstractAnimal
{


  public function manger(AbstractAnimal $animal){
    var_dump('Herbivore se fais manger...');
    return $animal->manger($this);
  }




}


 ?>
