<?php

class User {

use FormattageTrait;



protected $id;
protected $nom;
protected $prenom;
protected $dateNaissance;
protected $ville;
protected $codePostal;
protected $tel;
protected $biographie;
protected $email;
protected $password;
protected $inscription;
protected $dateAuth;
protected $bdd;


/**
 * Constructeur
 * Sert à initialiser un objet
 * DOUBLE UNDERSCORE
 */
public function __construct($nom, $prenom, $date_naissance, $ville, $code_postal, $tel, $biographie, $email, $password)
{
  $this->nom = $nom;
  $this->prenom = $prenom;
  $this->dateNaissance = $date_naissance;
  $this->ville = $ville;
  $this->codePostal = $code_postal;
  $this->tel = $tel;
  $this->biographie = $biographie;
  $this->email = $email;
  $this->password = $password;
  $this->dateAuth = new Datetime();  // À trouver
  $this->inscription = new DateTime();
  $this->bdd = $this->getPdo();
}


protected function getPdo(){
  return new PDO('mysql:host=localhost;dbname=testl10;charset=utf8', 'root', 'djscrave');
}

public function getNom()
{
  return $this->nom;
}
public function getPrenom()
{
  return $this->prenom;
}
public function getDob()
{
  return $this->date_naissance;
}
public function getEmail()
{
  return $this->email;
}
public function getPassword()
{
  return $this->password;
}$obj
public function getVille()
{
  return $this->ville;
}
public function getTel()
{
  return $this->tel;
}
public function getBiographie()
{
  return $this->biographie;
}
public function getInscription()
{
  return $this->inscription;
}

/**
 * Insert an user from object
 */
public function add() {

   $sql = $this->bdd->prepare("INSERT INTO `user`(`nom`, `prenom`, `email`, `password`, `ville`, `dob`, `date_created`)
   VALUES (:nom, :prenom, :email, :password, :ville, :date_naissance, :date_creation)");

    $resultat = $sql->execute(array(
     "nom"=>$this->nom,
     "prenom"=>$this->prenom,
     "email"=>$this->email,
     "password"=>$this->password,
     "ville"=>$this->ville,
     "date_naissance"=>$this->dateNaissance,
     "date_creation"=>$this->inscription->format('Y-m-d H:i:s')));


     $comment = new Comment('Utilisateur Ajouté', 5, 1,$this->bdd);
     $comment->insertComment($this->getLastUser());

     return $resultat;
 }

  /**
   *  Rcherche des utilisateurs selon une date
   */
   public static function searchUserDate(PDO $pdo, $search){

     $sql = "SELECT * FROM user WHERE dob >= '{$search->format('Y-m-d')}' ";
      return $pdo->query($sql)->fetchAll();
   }


 /**
  * Get Last User Id from table
  * Encapsulation: private donne la visilité qu'au sein de la classe et ses methodes
  */
 private function getLastUser(){
   $user_id = $this->bdd->query("SELECT id FROM user ORDER BY id DESC LIMIT 1")->fetch();
   return $user_id['id'];
 }

 /**
  * Modifier le mot de passe
  */
 public function modifierPassword($password, $id){
   $sql = $this->getPdo()->prepare("UPDATE user SET password = :password WHERE id = :id");

  return $resultat = $sql->execute(array(
        'password' => $password,
        'id' => $id,
    ));
 }



}














 ?>
