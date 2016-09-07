<?php

   class Categorie extends Contenu {

      protected $description;

      public function __construct($titre, $description){
         $this->titre = $titre;
         $this->description = $description;
      }

      public static function getCat(PDO $connexion){
         $sql = "SELECT * FROM categorie";
         return $connexion->query($sql)->fetchAll();
      }

   }
 ?>
