<?php
  if(isset($_GET["ID"])){
    $ID = $_GET["ID"];
    @include 'dbconnection.php';
    $sql = "DELETE FROM baptism WHERE ID=$ID";
    $conn->query($sql);
  }
  header("location:event.php");
  exit;
?>
