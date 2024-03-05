<?php
  if(isset($_GET["ID"])){
    $ID = $_GET["ID"];
    @include 'dbconnection.php';
    $sql = "DELETE FROM pledges WHERE ID=$ID";
    $conn->query($sql);
  }
  header("location:dashboard.php");
  exit;
?>