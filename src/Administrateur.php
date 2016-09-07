<?php

/**
 *
 */
class Administrateur extends User
{

  protected $forum;

  /**
   * Réécriture de mon constructeur parent
   * Tous les administarteur sont de Paris
   */
  public function __construct($forum){
    $this->forum = $forum;
    $this->ville = "Paris";
  }

  /**
   * Modifier la ville d'un utilisateur
   */
  public function modifierVille($ville, $id){

    $sql = $this->getPdo()->prepare("UPDATE `user`
    SET ville = :ville WHERE id = :id");

    return $sql->execute([
      'ville' => $ville,
      'id' => $id
    ]);


  }



  public function modifierPassword($password, $id){

    parent::modifierPassword($password, $id);
    $sql = $this->getPdo()->prepare("UPDATE user SET date_created = :date_created WHERE id = :id");

    $now = new DateTime();
     return $resultat = $sql->execute(array(
           'date_created' => $now->format('Y-m-d H:i:s'),
           'id' => $id
     ));

  }




}

















 ?>
