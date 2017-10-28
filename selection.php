<?php
  require_once("selectionGame.php");
  require_once("selectFile.php");
  if(session_status()==PHP_SESSION_NONE){
    session_start();
  }
?>
<html>
<head>
  <title>Quiz App - Selection Game</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="selection.css">
</head>
<body>
  <?php
  if(isset($_POST['answer']) && isset($_SESSION['lastAnswer'])){
    if(strtolower($_SESSION['lastAnswer'])===strtolower($_POST['answer'])){
      echo "<div class='result' id='right'><h2>Answer is Right</h2></div>";
    }else{
      echo "<div class='result' id='wrong'><h2>Answer is Wrong. Truth is ".$_SESSION['lastAnswer']."</h2></div>";
    }
  }
  $game = new selectionGame();
  $question = $game->getWord();
  $_SESSION['lastAnswer']=$question['answer'];
  if(isset($question)){
    echo "<div class='question'>".
    "<table>".
    "<form action='selection.php' method='post'>".
    "<tr><td>Question : </td><td>".$question['question'].
    "</td></tr>";
    $randanswerPlace = rand(0,sizeof($question['fake']));
    $count=0;
    $fakeindex=0;
    while($count<=sizeof($question['fake'])){
      if($randanswerPlace==$count){
        echo "<tr><td colspan='2'><input type='submit' class='answerButton' name='answer' value='".$question['answer']."'></td></tr>";
        //right answer placed
        $count++;
      }else{
        echo "<tr><td colspan='2'><input type='submit' class='answerButton' name='answer' value='".$question['fake'][$fakeindex]."'></td></tr>";
        $fakeindex++;
        $count++;
      }
    }
    "</form></table></div>";
  }
  ?>
  <a href="index.php" id="backButton">Back<span id="backIcon">&#8656</span></a>
</body>
</html>
