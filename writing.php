<?php
  require_once("writingGame.php");
  require_once("selectFile.php");
  if(session_status()==PHP_SESSION_NONE){
    session_start();
  }
?>
<html>
<head>
  <title>Quiz App - Writing Game</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="writing.css">
</head>
<body>
  <?php
  if(isset($_POST['answer']) && isset($_SESSION['lastAnswer'])){
    if(strtolower($_SESSION['lastAnswer'])===strtolower($_POST['answer'])){
      echo "<div class='result' id='right'><h2>Answer is Right</h2></div>";
    }else{
      echo "<div class='result' id='wrong'><h2>Answer is Wrong, Truth is ".$_SESSION['lastAnswer']."</h2></div>";
    }
  }
  $game = new writingGame();
  $question = $game->getWord();
  $_SESSION['lastAnswer']=$question['answer'];
  if(isset($question)){
    echo "<div class='question'>".
    "<table>".
    "<form action='writing.php' method='post'>".
    "<tr><td>Question: </td><td>".$question['question'].
    "</td></tr>".
    "<tr><td>Answer: </td>".
    "<td><input type='text' name='answer' id='answerbox'></tr></td>".
    "<tr><td colspan='2'><input type='submit' value='Answer' id='answerButton'></td></tr>".
    "</form></table></div>";
  }
  ?>

  <a href="index.php" id="backButton">Back<span id="backIcon">&#8656</span></a>
</body>
</html>
