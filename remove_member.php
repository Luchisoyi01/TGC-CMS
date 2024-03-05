<?php
  if(isset($_GET["ID"])){
    $ID = $_GET["ID"];
    @include 'dbconnection.php';
    $sql = "DELETE FROM members WHERE ID=$ID";
    $conn->query($sql);
  }
  header("location:register.php");
  exit;
?>
