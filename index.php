<?php
require_once('conn.php')
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charget="utf-8">
  </head>
  <body id="body" class="">
    <header>
      <h1><a href="index.php">생활코딩 Javascript</a></h1>
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
    <div id="content">

    <article>
<?php
if(empty($_GET['id'])){
  echo "welcome";
}else{
  $id=mysqli_real_escape_string($conn,$_GET['id']);
  $sql  = 'SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM `topic` left join user on topic.author = user.id where topic.id='.$id;
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
?>

  <h2><?=htmlspecialchars($row['title'])?></h2>
  <div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?> </div>
  <div><?=htmlspecialchars($row['description'])?></div>

<?php
}
?>

      <input type="button" name="name" value="white"
      onclick="document.getElementById('body').className=''">
      <input type="button" name="name" value="black"
      onclick="document.getElementById('body').className='black'">
      <a href="write.php">Write</a>
    </article>
  </div>
  </body>
</html>



<?php


?>
