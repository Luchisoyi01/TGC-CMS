<?php
  if(isset($_GET["ID"])){
    $ID = $_GET["ID"];
    @include 'dbconnection.php';
    $sql = "DELETE FROM bank_deposit WHERE ID=$ID";
    $conn->query($sql);
  }
  header("location:Bank.php");
  exit;
?>
