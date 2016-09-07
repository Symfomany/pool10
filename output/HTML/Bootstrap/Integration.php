<?php
namespace HTML\Bootstrap;

use PDF\Output;

class Integration{

  public function render(Output $output){

    return $output->render() . " ... avec Bootstrap";
  }


}





 ?>
