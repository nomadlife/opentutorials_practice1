<?php
$conn=mysqli_connect("localhost","root", "13579111");
mysqli_select_db($conn, "opentutorials2");

$sql  = 'SELECT * FROM `topic`';
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
  echo '<a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a><br />';
}

$id=$_GET['id'];
$sql="SELECT * FROM topic WHERE id=".$id;
$sql  = 'SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM `topic` left join user on topic.author = user.id where topic.id='.$id;
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo htmlspecialchars($row['title']);
echo '<br />';
echo htmlspecialchars($row['description']);
echo '<br />';
echo htmlspecialchars($row['created']);
echo '<br />';
echo htmlspecialchars($row['name']);
?>
