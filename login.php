<?php 
  /**
   * This code was writen by Watson luchisoyi:
   * Email watsonluchisoyi69@gmial.com
  */  
  session_start(); 
  include "dbconnection.php";
  if (isset($_POST['UserName']) && isset($_POST['password'])) {

    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $uname = validate($_POST['UserName']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
      header("Location: index.php?error=Username is required");
      exit();
    }else if(empty($pass)){
      header("Location: index.php?error=Password is required");
      exit();
    }else{
      $sql = "SELECT * FROM tbladmin WHERE UserName='$uname' AND Password='$pass'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
          if ($row['UserName'] === $uname && $row['password'] === $pass) {
            $_SESSION['UserName'] = $row['UserName'];
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['id'] = $row['id'];
            header("Location: dashboard.php");
          exit();
          }else{
          header("Location: index.php?error=Incorect Username or password");
          exit();
        }
      }else{
        header("Location: index.php?error=Incorect Username or password");
        exit();
      }
    }
    /**
     * This code was writen by Watson luchisoyi:
     * Email watsonluchisoyi69@gmial.com
    */    
  }else{
    header("Location: index.php");
    exit();
  }
?>