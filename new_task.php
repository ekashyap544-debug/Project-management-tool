<?php
include 'config.php';
$pid = $_GET['pid'];
if(isset($_POST['submit'])){
  mysqli_query($conn, "INSERT INTO tasks(project_id, title, description)
  VALUES($pid,'$_POST[title]','$_POST[desc]')");
  header("Location: board.php?id=$pid");
}
?>
<h1>New Task</h1>
<form method="POST">
  Title: <input type="text" name="title" required><br><br>
  Description: <textarea name="desc"></textarea><br><br>
  <input type="submit" name="submit" value="Create Task">
</form>
