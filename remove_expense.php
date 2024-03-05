<?php
  if(isset($_GET["ID"])){
    $ID = $_GET["ID"];
    @include 'dbconnection.php';
    $sql = "DELETE FROM expense WHERE ID=$ID";
    $conn->query($sql);
  }
  header("location:inventory.php");
  exit;
?>
