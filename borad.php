<?php include 'config.php'; $pid = $_GET['id'];?>

<h1>Project Board</h1>
<a href="new_task.php?pid=<?=$pid?>">+ Add Task</a> | <a href="dashboard.php">Back</a>
<hr>

<div style="display:flex; gap:10px;">
<?php
$statuses = ['todo'=>'To Do', 'inprogress'=>'In Progress', 'done'=>'Done'];
foreach($statuses as $key => $label){
  echo "<div style='width:30%; border:1px solid #ccc; padding:10px;'>";
  echo "<h3>$label</h3>";

  $tasks = mysqli_query($conn, "SELECT * FROM tasks WHERE project_id=$pid AND status='$key'");
  while($t = mysqli_fetch_assoc($tasks)){
    echo "<div style='background:#f1f1f1; padding:8px; margin:5px;'>";
    echo "<b>".$t['title']."</b><br>";
    echo "<small>".$t['description']."</small><br>";
    echo "<a href='task.php?id=".$t['id']."'>View + Comment</a>";
    echo "</div>";
  }
  echo "</div>";
}
?>
</div>
