<?php
  session_start();
  include_once('print.php');
?>

<html>
<head>
  <title>Quiz App</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
    banner();
    menu();
    if(isset($_SESSION['file'])){
      deleteForm();
    }else{
      fileForm();
    }
    ?>
</body>
</html>
