<?php
require_once('conn.php');
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>


   </head>
   <body>
     <header>
        <h1> <a href="index.php">생활코딩javascript</a></h1>
     </header>
     <nav>
       <ol>
         <?php
         $sql="select * from `topic`"
          ?>
       </ol>
     </nav>
   </body>
 </html>
