<?php
     $host = "localhost";
     $mail = "root"; 
     $password = ""; 
     $dbname = "lezgo_moisil"; 
     
     $conn = mysqli_connect($host, $mail, $password, $dbname);
     
     if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
     }
?>