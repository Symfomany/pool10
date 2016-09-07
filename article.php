<?php session_start(); ?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.2.0/css/bootstrap-slider.min.css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <?php
      require "src/Categorie.php";
     ?>

    <div class="container-fluid">

      <?php if(isset($_SESSION['user'])){ ?>
      <div class="row">

        <div class="col-md-7">
          <h3>Ajout d'un article</h3>
      <form action="article.php" method="post">
         <div class="row">
            <div class="col-xs-4">
               <div class="form-group">
                 <label for="titre">Titre</label>
                 <input required="required" type="text" name="titre" class="form-control" id="titre" placeholder="Titre">
              </div>
            </div>
            <div class="col-xs-4">
               <div class="form-group">
                 <label for="annee_publication">Année</label>
                 <input required="required" type="text" name="annee_publication" class="form-control" id="annee_publication" placeholder="Année">
              </div>
            </div>
            <div class="col-xs-4">
               <div class="form-group" id="divNote">
                  <span class="spanNote">Note: </span>
                  <input  id="note" type="text" name="note" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="10"/>
                  <span class="spanNote" id="sliderVal">10</span>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-12">
               <div class="form-group">
                  <label for="resume">Résumé</label>
                  <input required="required" type="text" name="resume" class="form-control" id="resume" placeholder="Résumé">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-6">
               <div class="form-group">
                  <label for="image">Image</label>
                  <input type="text" name="image" class="form-control" id="image" placeholder="Url de l'image">
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-12">
               <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" class="form-control" rows="3" id="description" placeholder="description"></textarea>
               </div>
            </div>
         </div>

         <div class="row">
         <div class="col-xs-4">
               <div class="form-group" id="categorie">
                  <select class="form-control" name="categorie">
                     <?php
                     $connexion = new PDO('mysql:host=localhost;dbname=testl10', 'root', 'djscrave');
                        $cat = Categorie::getCat($connexion);
                        foreach ($cat as $titre) { ?>
													<option value="<?php echo $titre['id'] ?>">
                               <?php echo $titre['title']; ?>
                          </option>
                        <?php } ?>
                  </select>
               </div>
            </div>
            </div>


        <button type="submit" class="btn btn-default">Ajoute pas l'article</button>
      </form>
    </div>

    <?php }else{ ?>

    <div class="alert alert-danger">
        <strong>ATtention</strong> veillez vous connectez
        <a href="app.php">C'est par ici</a>
    </div>

    <?php } ?>
  </div>

   </div>

   <?php
   require "src/Article.php";
   require "src/ArticleForm.php";

   if(isset($_POST['titre'])){
     $connexion = new PDO('mysql:host=localhost;dbname=testl10', 'root', 'djscrave');
     $article = new ArticleForm($connexion, $_POST);
     $article->save();
   }







    ?>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.2.0/bootstrap-slider.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#note").slider({
          tooltip: 'hide'
        });
        $("#note").on("slide", function(slideEvt) {
          $("#sliderVal").text(slideEvt.value);
        });
      });
    </script>


  </body>
</html>


<?php












 ?>
