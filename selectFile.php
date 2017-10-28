<?php
  class selectFile{
    function __construct(){
      if(session_status()==PHP_SESSION_NONE){
        session_start();
      }
    }

    function setFile(){
      move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file']['tmp_name']);
      $_SESSION['file']=$_FILES['file']['tmp_name'];
    }

    function getFile(){
      return $_SESSION['file'];
    }
  }

if(isset($_POST['isSet'])){
  if($_POST['isSet']==True){
    if(isset($_FILES['file'])){
      $register = new selectFile();
      $register->setFile();
      echo "File Selected You Will Be Redirect After 3 Seconds";
      header("refresh:3; url=index.php");
    }else{
      echo "Please choose a valid file";
      header("refresh:3; url=index.php");
    }
  }
}
?>
