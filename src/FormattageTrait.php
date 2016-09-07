<?php

trait FormattageTrait{


  /**
   * Traitement
   */
  public function traitement($chaine)
  {
    return trim(ucfirst(strip_tags($chaine)));
  }



}









 ?>
