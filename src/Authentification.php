<?php


class Authentification extends Connexion{



  /**
   * Recherche d'un utilisateur par son email
   * @param  [string] $email [description]
   * @return [array]        [description]
   */
  public function searchUserEmail($email, $password) {
    $sql = "SELECT * FROM user WHERE email = '{$email}' AND password = '{$password}'";
    return $this->bdd->query($sql)->fetch();
  }


  /**
   * Ajoute un utilisateur en session
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function login($user){

    // $_SESSION est une superglobal($_POST)
    // et permet de stocker en session des données à travers des clefs
     $_SESSION['user'] = [
       'email' => $user['email'],
       'id' => $user['id']
     ];
   }


  public function logout() {

    if (isset($_SESSION['user'])) {
      // Pensé à associer unset et destroy
      unset($_SESSION['user']); // Suppresion de la clé "user" du tableau $_SESSION
    }

    session_destroy(); // Déconnecte de la session
  }




}




 ?>
