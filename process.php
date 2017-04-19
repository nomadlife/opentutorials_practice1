<?php
$conn=mysqli_connect("localhost","root", "13579111");
mysqli_select_db($conn, "opentutorials2");
// 2. 저자가 user table 에 존재하는지 여부를 체크
$author = mysqli_real_escape_string($conn, $_POST['author']);
// $sql = "SELECT * FROM `user` WHERE `name` = '".$author."'"; 중괄호 변환전
$sql = "SELECT * FROM `user` WHERE `name` = '{$author}'";
$result = mysqli_query($conn, $sql);

if($result->num_rows>0){
// 존재한다면 user의 id값을 알아낸다.
  $row = mysqli_fetch_assoc($result);
  $user_id = $row['id'];
//  var_dump($row['id']);
}else{
// 존재하지 않는다면, 저자를 user table에 추가하고, id값을 알아낸다.
  $sql = "INSERT INTO user (id,name) VALUES (NULL, '{$author}');";
  $result = mysqli_query($conn, $sql);
  $user_id = mysqli_insert_id($conn); //직전실행 쿼리의 행의 id값을 리턴.
}

// 제목, 저자(user.id), 본문등을 topic table에 추가.
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$sql = "INSERT INTO topic (id, title, description, author, created) VALUES (NULL, '{$title}','{$description}','{$user_id}', now());";
// 그레이브 액센트는 테이블명에 쓰이고, 생략가능하지만, 어떤때는 반드시 써야함. 구조와 관련된 어떤 이름을 명명할때. 작은따옴표와 구분할것.
mysqli_query($conn,$sql);

//var_dump($result->num_rows);

 ?>
