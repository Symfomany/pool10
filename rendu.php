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



    <?php

    require "vendor/autoload.php";

    use HTML\Output as OutputHTML;
    use PDF\Output as OutputPDF;
    use Excel\Output as OutputExcel;
    use HTML\Bootstrap\Integration;

    use Image\Output as OutputImage;

    $image = new OutputImage();
    // $image->render("image/hollande.jpg");

    // $outhtml = new OutputHTML();
    // $outpdf = new OutputPDF();
    // $outpdf->render();

    // $outexcel = new OutputExcel();
    // $connexion = new PDO('mysql:host=localhost;dbname=testl10', 'root', 'troiswa');
    // $outexcel->render($connexion);

    // $integration = new Integration();
    //
    // var_dump($outhtml->render(), $outpdf->render());
    // var_dump($integration->render($outpdf));

    // $output = new Output()
     ?>le already existsload d'image</h3>
     <form  action="" enctype="multipart/form-data" method="post">

       <input accept="image/*" capture="capture" type="file" name="photo">
       <?php
       if (isset($_POST['button'])) {
         $resultat = $image->upload($_FILES);
         if (isset($resultat['name'])) {
           $imgThumb = $image->render("image/".$resultat['name']);
            ?>
           <div class="row">
             <div class="col-xs-6 col-md-3">
               <img src="image/img-thumbs.jpg"  />
             </div>
           </div>

         <?php } else{ ?>
            <div class="alert alert-danger">
                <?php echo $resultat[0]; ?>
            </div>
         <?php }
       } ?>

       <button type="submit" name="button">Envoyer ce fichier</button>
     </form>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
