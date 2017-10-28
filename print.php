<?php
  function banner(){
    echo '<div class="banner">
    <h2>MyQuiz</h2>
    <h4>Google Translate Words Quiz</h4></div>';
  }

  function menu(){
    echo '<div class="menu">
    <h2>Game List</h2><hr>
    <ul>
    <li><a href="writing.php" class="button">Writing Game</a></li>
    <li><a href="selection.php" class="button">Selection Game</a></li>
    </ul>
    </div>';
  }

  function fileForm(){
    echo '<div class="fileForm">
    <h3>Google Translate File</h3>
    <table>
    <form action="selectFile.php" method="post" enctype="multipart/form-data" >
    <tr>
    <td>File :</td>
    <td><input type="file" name="file"></td>
    </tr>
    <tr>
    <input type="hidden" name="isSet" value=True>
    <td colspan="2"><input type="submit" name="submit" value="Send" class="button sendButton"></td>
    </tr>
    </table>';
  }

  function deleteForm(){
    echo '<div class="fileForm">
    <h3>Google Translate File</h3>
    <table>
    <form action="deleteFile.php" method="post" enctype="multipart/form-data" >
    <tr>
    <td colspan="2">You have inserted a file before. If you want to add new file, have to delete previous one.</td>
    </tr>
    <tr>
    <input type="hidden" name="isSet" value=True>
    <td colspan="2"><input type="submit" name="submit" value="Delete" class="button sendButton"></td>
    </tr>
    </table>';
  }
?>
