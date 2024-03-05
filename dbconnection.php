<?php 
  /**
   * This code was writen by Watson luchisoyi:
   * Email watsonluchisoyi69@gmial.com
  */  
  // Database connection parameters
  define('DB_HOST','localhost');
  define('DB_USER','root');
  define('DB_PASS','');
  define('DB_NAME','tabernacle');

  // Create a database connection
  try{
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  }
  catch (PDOException $e){
    exit("Error: " . $e->getMessage());
  }
  $conn = mysqli_connect("localhost","root","","tabernacle");

  // Check the connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  /**
   * This code was writen by Watson luchisoyi:
   * Email watsonluchisoyi69@gmial.com
  */  
?>