<?php

include_once("Classes/PHPExcel/IOFactory.php");

class selectionGame{
  function getWord(){
    $fakeAnswerCount = 3;
    $selectFile = new selectFile();
    if(!empty($selectFile->getFile())){
      try{
          $inputfilename = $selectFile->getFile();
          $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
          $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
          $objPHPExcel = $objReader->load($inputfilename);
          $worksheet = $objPHPExcel->getSheet(0);
          $lastRow = $worksheet->getHighestRow();

          $random = rand(1, $lastRow);
          $question['question'] = $worksheet->getCell('C'.$random)->getValue();
          $question['answer'] = $worksheet->getCell('D'.$random)->getValue();
          //select 3 fake answer
          for($count=0;$count<$fakeAnswerCount;$count++){
            while(($fakerand=rand(1, $lastRow))!=$random){
                $question['fake'][$count]=$worksheet->getCell('D'.$fakerand)->getValue();
            }
          }
          return $question;

      }catch(Exception $e){
        die('Error loading file "'.pathinfo($_FILES['file']['tmp_name'],PATHINFO_BASENAME).'": '.$e->getMessage());
      }
    }
  }
}
?>
