<?php include 'config.php'; $user_id = 1;?>

<h1>📊 CodeAlpha Projects</h1>
<a href="new_project.php">+ New Project</a><hr>

<?php
$projects = mysqli_query($conn, "SELECT * FROM projects");
while($p = mysqli_fetch_assoc($projects)){
  echo "<div style='border:1px solid #333; padding:15px; margin:10px;'>";
  echo "<h2><a href='board.php?id=".$p['id']."'>".$p['name']."</a></h2>";
  echo "</div>";
}
?>
