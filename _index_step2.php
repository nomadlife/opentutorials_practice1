<?php
$conn=mysqli_connect("localhost","root", "13579111");
mysqli_select_db($conn, "opentutorials2");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <h1>생활코딩 Javascript</h1>
    </header>

    <nav>
      <ol>
<?php
$sql  = 'SELECT * FROM `topic`';
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
  echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
}
?>
      </ol>
    </nav>

    <article>
<?php
$id=mysqli_real_escape_string($conn,$_GET['id']);
$sql  = 'SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM `topic` left join user on topic.author = user.id where topic.id='.$id;
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

<h2><?=htmlspecialchars($row['title'])?></h2>
<div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?> </div>
<div><?=htmlspecialchars($row['description'])?></div>
    </article>
  </body>
</html>



<?php


?>
