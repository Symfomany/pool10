<?php

   class Categorie {

      protected $titre;
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
