<?php
include 'config.php';
$tid = $_GET['id'];
if(isset($_POST['comment'])){
  mysqli_query($conn, "INSERT INTO task_comments(task_id, user_id, comment)
  VALUES($tid, 1, '$_POST[comment]')");
}
$task = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tasks WHERE id=$tid"));
?>

<h1>Task: <?=$task['title']?></h1>
<p><?=$task['description']?></p><hr>

<h3>Comments</h3>
<?php
$comments = mysqli_query($conn, "SELECT * FROM task_comments WHERE task_id=$tid");
while($c = mysqli_fetch_assoc($comments)) echo "<p>- ".$c['comment']."</p>";
?>

<form method="POST">
  <input type="text" name="comment" placeholder="Add comment">
  <input type="submit" value="Send">
</form>
