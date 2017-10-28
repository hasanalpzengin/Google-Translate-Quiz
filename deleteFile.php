<?php
  if(session_status()==PHP_SESSION_NONE){
    session_start();
  }
  if(isset($_SESSION['file'])){
    unlink($_SESSION['file']);
    unset($_SESSION['file']);
    echo "File Deleted You Will be Redirected in 3 Seconds";
    header("refresh:3; url=index.php");
  }else{
    echo "You don't have a inserted file. You will be redirected in 3 seconds.";
    header("refresh:3; url=index.php");
  }
?>
