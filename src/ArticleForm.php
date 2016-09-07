<?php

/**
 *
 */
class ArticleForm extends Article
{


  public function save(){

    $this->titre = self::traitement($this->titre);
    $this->resume = self::traitement($this->resume);
    $this->description = self::traitement($this->description);

    parent::save();
  }


  /**
   * Traitement
   */
  protected static function traitement($chaine)
  {
    return trim(ucfirst(strip_tags($chaine)));
  }

}











 ?>
