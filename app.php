<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">

      <a href="contact.php" class="btn btn-danger">Contact</a>
    <?php
    // inclusion du fichier où il y a ma classe
    require "src/Connexion.php";
    require "src/Authentification.php";
    require "src/Comment.php";
    require "src/User.php";
    require "src/Administrateur.php";
    ?>

    <div class="col-md-8">

      <form method="POST" action="app.php" class="form-horizontal">
          <div class="form-group">
            <label for="email">Login</label>
            <input required name="email" id="email" type="email" class="form-control" placeholder="Votre identifiant">
          </div>
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input required name="password" id="password" type="password" class="form-control" placeholder="Votre mot de passe">
          </div>

          <button class="btn btn-sm btn-primary" type="submit" name="button">
              <span class="fa fa-check"></span>
              Connexion
          </button>
        </form>



        <a href="?action=deconnexion" class="btn btn-primary">
          Deconnexion
        </a>

        <?php
          $auth = new Authentification("localhost", "root", "djscrave");

          // si j'ai cliqué sur mon boutton Deconnexion
          if (isset($_GET['action'])) {
              $auth->logout();
          }

         ?>

</div>

</div>

    <?php


    // $_POST => tableaux associatif qui s'hydrate en données
    if(isset($_POST['email'])){
    // if(count($_POST)){

      $user = $auth->searchUserEmail($_POST['email'], $_POST['password']);

      if($user && preg_match('/[a-z]{3,}/', $_POST['email'])){
          $auth->login($user);
      }
    }

    if (isset($_SESSION['user'])) {

      echo "<p>Vous êtes connecté  {$_SESSION['user']['email']} </p>";

    }



    // $user = new User("Bertrand", "Jean", "1970-10-14","New Jersey city","00045","0474272459","blabla","Bertrand@jean.com","12345");
    // $administrateur = new Administrateur("StackOverflow");
    // var_dump($administrateur);
    //
    // $administrateur->modifierVille('Chicago', 1);
    //
    // $user->modifierPassword('alpha', 1);
    // $administrateur->modifierPassword('beta', 2);

    /**
     * Créer une méthode permettant aux utilisateurs
     * normaux comme aux administrateur de pourvoir modifier son mot de passe .
     * Quand c'est un administarteur qui modifie son mot de passe, cela modifier également la date d'inscription/création
     */



     // new NomdemaClasse()
     // crée un objet de ma classe Connexion <=> instance de classe

    // $connexion = new PDO('mysql:host=localhost;dbname=testl10', 'root', 'djscrave');
    //
    // $user1 = new User("Bertrand", "Jean", "1970-10-14","New Jersey city","00045","0474272459","blabla","Bertrand@jean.com","12345");
    //
    // var_dump($user1->add());
    //
    //
    // $dateSearch = new DateTime('1985-11-20');
?>

      <?php
    //  $comment1 = new Comment("Mon comment modifié", 3, 1, $connexion);
    //  $comment2 = new Comment("Mon super comment numero 2", 3, 0, $connexion);
    //  $comment3 = new Comment("Mon meilleur commentaire", 3, 1, $connexion);
    //
    // //var_dump($comment1->insertComment());
    //   $commentaires = [
    //     $comment1,
    //     $comment2,
    //     $comment3
    //   ];

    //   var_dump(Comment::insertLotComments($commentaires));
    //
    // //  var_dump(var_dump$comment1,$comment2, $comment3);
    //
    //
    //   var_dump(Comment::modifyContentNote($connexion, $comment1, 10));
    //   var_dump(Comment::supprimerComment($connexion, 17));




    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>



















 ?>
