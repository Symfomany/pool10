<?php

/**
 *
 */
class Humain implements ActionsInterface
{

  use FormattageTrait;


    public function dormir($nbJour){
        return "Je dors sur un lit avec un nb de jour". $this->traitement($nbJour)." jours...";
    }

    public function marcher(){

      return "Je marche sur la terre";
    }


    public function digerer(ActionsInterface $obj){
        $obj->manger();

        return "Je digère..Arretes de me souler avec ton orienté objet";


    }



}











 ?>
