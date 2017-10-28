<?php
  if(isset($_FILES['file'])){
    $path = $_FILES['file']['name'];
    $array = explode('.',$path);
    $extension = end($array);

    if(strtolower($extension)==='xls' || strtolower($extension)==='xlsx' || strtolower($extension)==='xml' || strtolower($extension)==='ods' || strtolower($extension)==='csv'){
      session_start();
      $_SESSION['words']=True;
      $tmp_name = $_FILES['file']['tmp_name'];
      move_uploaded_file($tmp_name, "/home/hasalp/translatefile.".strtolower($extension));
    }else{
      $error = True;
    }
  }else{
    $error = True;
  }

  function deleteFile(){
    unlink("/uploads_dir/translatefile.".strtolower($extension));
  }
?>
