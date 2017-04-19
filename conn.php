<?php
$conn = mysqli_connect('localhost','root','13579111');
mysqli_select_db($conn, 'opentutorials2');
$sql = "SELECT * FROM `topic`";
$result = mysqli_query($conn,$sql);
 ?>
