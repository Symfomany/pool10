<?php

namespace Excel;

use \PDO;
use PHPExcel;
use PHPExcel_IOFactory;

class Output{


  public function render(PDO $pdo){
    $users = $pdo->query("SELECT * FROM user ORDER BY id DESC LIMIT 10")->fetchAll();
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("Julien Boyer")
							 ->setTitle("10 derniers utilisateurs")
							 ->setSubject("10 derniers utilisateurs")
							 ->setDescription("Les 10 dernires tilisateurs en bdd");

     foreach($users as $key => $user){
       $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue("A{$key}", $user['email']);
     }

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save("downloads/users.xls");
  }





}




 ?>
