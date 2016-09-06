<?php

require "vendor/autoload.php";

use HTML\Output as OutputHTML;
use PDF\Output as OutputPDF;
use Excel\Output as OutputExcel;
use HTML\Bootstrap\Integration;


// $outhtml = new OutputHTML();
// $outpdf = new OutputPDF();
// $outpdf->render();

$outexcel = new OutputExcel();
$connexion = new PDO('mysql:host=localhost;dbname=testl10', 'root', 'djscrave');
$outexcel->render($connexion);

// $integration = new Integration();
//
// var_dump($outhtml->render(), $outpdf->render());
// var_dump($integration->render($outpdf));

// $output = new Output()




 ?>
