<?php
 if(isset($_GET["cin"])){
    $cin = $_GET["cin"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database ="etudiant";

    //Create connection
    $connection = new mysqli($servername, $username, $password,$database);
    
    $sql ="DELETE FROM etudiant WHERE cin=$cin";
    $connection->query($sql);
  }

  header("location: /Mypage/index.php");
  exit;
?>