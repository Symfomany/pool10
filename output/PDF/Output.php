<?php
namespace PDF;

use Dompdf\Dompdf;

/**
 * Class Output
 */
class Output{
  /**
   * Rendu du résultat au format PDF
   */
  public function render(){
    $dompdf = new Dompdf();
    $dompdf->loadHtml("<h3>Resultat en PDF</h3>");
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    return $dompdf->stream('resultat', ["Attachment" => 0]);
  }



}



 ?>
