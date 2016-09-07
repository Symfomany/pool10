<?php
  session_start();
  require "inscription/User.php";
  require "src/Comment.php";
  require "src/Connexion.php";
  require "src/Authentification.php";
?>
<!DOCTYPE html>
<html lang="fr">
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

      <form action="" method="post">
        <div class="row">
          <div class="form-group col-xs-6">
            <label for="nom">Nom : </label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            <p class="help-block">Minimum 3 lettres / Uniquement des lettres</p>
          </div>
          <div class="form-group col-xs-6">
            <label for="prenom">Prénom : </label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
            <p class="help-block">Minimum 3 lettres / Uniquement des lettres</p>
          </div>
          <div class="form-group col-xs-12">
            <label for="password">Mot de passe : </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
          </div>
          <div class="form-group col-xs-6">
            <label for="email">E-mail : </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">

            <?php if(isset($_POST['email']) && User::searchByMailBoolean($_POST['email'])){ ?>
                <div class="alert alert-danger">
                    <p>Votre email existe deja</p>
                </div>
            <?php } ?>
          </div>
          <div class="form-group col-xs-6">
            <label for="telephone">Téléphone : </label>
            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Numéro de téléphone">
            <p class="help-block">Format: 06 11 22 33 44 (espace ou . ou -)</p>
          </div>
          <div class="form-group col-xs-4">
            <label for="cp">Code postal : </label>
            <input type="text" class="form-control" id="cp" name="cp" placeholder="Code postal">
          </div>
          <div class="form-group col-xs-4">
            <label for="ville">Ville : </label>
            <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
          </div>
          <div class="form-group col-xs-4">
            <label for="date_naissance">Date de naissance : </label>
            <input type="date" class="form-control" id="dob" name="date_naissance">
          </div>
          <div class="form-group col-xs-12">
            <label for="biographie">Biographie : </label>
            <textarea class="form-control" id="biographie" name="biographie" rows="5" placeholder="Ecrivez votre roman"></textarea>
          </div>
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary">Création de l'utilisateur</button>
          </div>
        </div>
      </form>

    </div>


    <?php

    var_dump($_GET);
    $auth = new Authentification("localhost", "root", "djscrave");

    if (isset($_GET['action']) && isset($_GET['email'])) {
       $auth->logout();
       User::deleteUserWithMail($auth, $_GET['email']);
    }  ?>

   <?php if (isset($_SESSION['user'])) { ?>
        <p>Vous êtes connecté  <?php echo $_SESSION['user']['email'] ?> </p>
        <a href='?action=deconnexion&email=<?php echo $_SESSION['user']['email'] ?>' class='btn btn-primary'>
           Deconnexion et Suppression
        </a>";

    <?php } ?>



     ?>


    <?php


      if (isset($_POST["email"])) {
        try{
          $user = new User(
          $_POST['nom'],$_POST['prenom'],$_POST['date_naissance'],
          $_POST['ville'], $_POST['cp'], $_POST['tel'], $_POST['biographie'], $_POST['email'], $_POST['password']);

          $user->addUser();

        }
        catch(LogicException $e){
          echo "<p>{$e->getMessage()}</p>";
          // executer autre chose...
        }
        catch(Exception $e){
          echo "<p>{$e->getMessage()}</p>";
          // executer autre chose...
        }



      }



     ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
