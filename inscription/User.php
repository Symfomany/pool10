<?php

/**
 *
 */
class User {


  const PAYS = "France";
  const LANGUE = "fr";

  protected $id;
  protected $nom;
  protected $prenom;
  protected $date_naissance;
  protected $ville;
  protected $code_postal;
  protected $tel;
  protected $biographie;
  protected $email;
  protected $password;
  protected $inscription;
  protected $date_auth;
  protected $bdd;


  /**
   * Constructeur
   * Sert à initialiser un objet
   * DOUBLE UNDERSCORE
   */
  public function __construct($nom, $prenom, $date_naissance, $ville, $code_postal, $tel, $biographie, $email, $password)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->date_naissance = $date_naissance;
    $this->ville = $ville;
    $this->code_postal = $code_postal;
    $this->tel = $tel;
    $this->biographie = $biographie;
    $this->email = $email;
    $this->password = $password;
    $this->date_auth = new Datetime();
    $this->inscription = new DateTime();
    $this->bdd = self::getPDO();
  }

  protected static function getPDO()
  {
    return new PDO('mysql:host=localhost;dbname=testl10;charset=utf8', 'root', 'djscrave');
  }

  //Plus approprié en public qu'en static (mais bon)
  public function addUser()
  {
    if(self::searchByMailBoolean($this->email)){
      throw new Exception('Email déjà existant');
    }

    var_dump('Je ne suis pà la pour être ici.');

    $sql = self::getPDO()->prepare("INSERT INTO user (inscription, nom, prenom, tel, code_postal, biographie, ville, date_naissance, email, password, date_auth, forum, date_created) VALUES (:inscription, :nom, :prenom, :tel, :cp, :bio, :ville, :dob, :email, :password, :date_auth, :forum, :date_created)");

    $now = new DateTime();
    $sql->execute(array(
      'nom' => $this->nom,
      'prenom' => $this->prenom,
      'dob' => $this->date_naissance,
      'inscription' => $this->inscription->format('Y-m-d H:i:s'),
      'date_auth' => $this->date_auth->format('Y-m-d H:i:s'),
      'email' => $this->email,
      'password' => sha1($this->password),
      'ville' => $this->ville,
      'cp' => $this->code_postal,
      'tel' => $this->tel,
      'bio' => $this->biographie,
      'forum' => $this->forum,
      'date_created' => $now->format('Y-m-d H:i:s')
      )
    );
    //Récupèrerl'id du dernier user ajouté NE PAS OUBLIER LE FECTH!
    $userId = $this->bdd->query("SELECT id FROM user ORDER BY id DESC LIMIT 1")->fetch();
    // var_dump($userId["id"]);
    $comment = new Comment("Utilisateur numéro {$userId["id"]} ajouté", 5, 1, $this->bdd);
    $comment->insertComment($userId['id']);

    return true;
  }

  public static function searchByMailOrName(PDO $pdo, $search)
  {
    $result = $pdo->query("SELECT nom, prenom, email FROM user WHERE nom LIKE '%".$search."%' OR email LIKE '".$search."'");

    return true;
  }

  public static function searchByMail($search)
  {
    $result = self::getPDO()->query("SELECT nom, prenom, email FROM user WHERE email LIKE '%".$search."%'")->fetchALl();

    //test existence
    if (!$result) {
      echo "<div class='alert alert-danger' role='alert'>Le mail {$search} n'a pas été trouvé dans la base.</div>";
      return false;
    }
    foreach ($result as $value) {
      echo "<pre>";
      var_dump  ($value);
      echo "</pre>";
    }

    return true;
  }

  public static function searchByMailBoolean($search)
  {
    return self::getPDO()->query("SELECT nom, prenom, email FROM user WHERE email LIKE '%".$search."%'")->fetch();
  }

  public function modifierPassword($newPassword, $id)
  {
    $sql = self::getPDO()->prepare("UPDATE user SET password = :newPassword WHERE id = :id");
    return $sql->execute(array(
      'newPassword' => $newPassword,
      'id' => $id
     )
   );
  }


  public function verifyMajeur(){
    return date_diff(new DateTime($this->date_naissance), new DateTime())->format('%y') > 18;
  }


  public static function deleteUserWithMail(Connexion $connexion, $mail){
     $sql = $connexion->getPdo()->prepare('DELETE FROM user WHERE email = :mail');
     return $sql->execute(array(
        'mail' => $mail
      ));
  }


  public static function saveUser($POST)
  {
    $user = UserForm::format($POST);
    // if (!preg_match("/[a-z]{3,}/i", "ef")) {
    //   echo "<div class='alert alert-danger'>Champ non respecté (3 caractères minimum et alphanumériques) !</div>";
    // }
    $user->addUser();
    return true;
  }
}
 ?>
