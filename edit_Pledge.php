<?php
  @include 'dbconnection.php';
  $ID = "";
  $Name = "";  
  $Phone = "";
  $Pledge = "";
  $errorMessage = "";
  $successMessage ="";

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //GET Method to display the data of a member 
    if (!isset($_GET["ID"])){
      header("Location: dashboard.php");
      exit;
    }
    $ID = $_GET["ID"];
    //read the row of the selected member from the db
    $sql ="SELECT * FROM pledges WHERE ID=$ID";
    $result = $conn ->query($sql);
    $row = $result ->fetch_assoc();
    if(!$row){
      header("location: dashboard.php");
      exit;
    }
    $Name = $row["Name"];
    $Phone = $row["Phone"];
    $Pledge = $row["Pledge"];
  }else{
    //POST method update the data of a member
    $ID =$_POST["ID"];
    $Name = $_POST["Name"];
    $Phone = $_POST["Phone"];
    $Pledge = $_POST["Pledge"];

    do{
      if( empty($Name)|| empty($Phone) || empty($Pledge) ){
        $errorMessage = "All the fields are required";
        break;
      }
      $sql = "UPDATE pledges ".
        "SET Name = '$Name', 
          Phone='$Phone', 
          Pledge='$Pledge'".
        "WHERE ID ='$ID' ";
      $result = $conn ->query($sql);

      if(!$result){
        $errorMessage="Invalid query: ". $conn->error;
        break;
      }
      $successMessage = "Pledge updated correctly";
      header("location: dashboard.php");
      exit;
    }while(true);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="favicon" href="images/logo.jpg"/>
  <title>Tabernacle of Grace Church</title>  
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Styles/footer.css">
  <link rel="stylesheet" href="Styles/dashboard.css">
  <link rel="stylesheet" href="Styles/editMember.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>
<body>
  <div class="content">
    <div class="grace">
    <aside>
      <div class="toggle">
        <div class="logo">
          <img src="images/logo.jpg">
          <h4>Tabernacle of <span class="danger">Grace Church</span></h4>
        </div>
        <div class="close" id="close-btn">
          <span class="material-icons-sharp">
          close
          </span>
        </div>
      </div>
      <div class="sidebar">
          <a href="dashboard.php" class="active">
            <span class="material-icons-sharp">
              edit
            </span>
            <h3>Update Pledge</h3>
          </a>
          <a href="register.php" >
            <span class="material-icons-sharp">
            person_outline
            </span>
            <h3>Member registration</h3>
          </a>
          <a href="Bank.php" >
            <span class="material-icons-sharp">
              receipt_long
            </span>
            <h3>Bank deposits</h3>
          </a>
          <a href="event.php">
            <span class="material-icons-sharp">
              event
            </span>
            <h3>Events</h3>
          </a>
          <a href="inventory.php">
            <span class="material-icons-sharp">
              inventory
            </span>
            <h3>Expense</h3>
          </a>
          <a href="index.php">
            <span class="material-icons-sharp">
              logout
            </span>
            <h3>Logout</h3>
          </a>
      </div>
    </aside>
    </div>
    <div class="church">
    <div class="containe">
    <h2>Update Pledges</h2>
    <br>
    <?php 
      if(!empty($errorMessage)){
        echo "
          <div class='alert alert-warning alert-dismissible fade show' role= 'alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss= 'alert' aria-label='close'></button>
          </div>
        ";
      }   
    ?>
    <form method="post">
      <input type="hidden" name="ID" value="<?php echo $ID; ?>">
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col sm 6">
        <input type="text" class="form-control" name="Name" value="<?php echo $Name; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Phone</label>
        <div class="col sm 6">
          <input type="text" class="form-control" name="Phone" value="<?php echo $Phone; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Pledge</label>
        <div class="col sm 6">
          <input type="text" class="form-control" name="Pledge" value="<?php echo $Pledge; ?>">
        </div>
      </div>
      
      <!--the submit button-->
      <?php 
        if (!empty($successMessage)) {
          echo "
            <div class='row mb-3'>
              <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong> $successMessage </strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
              </div>
            </div>                
          ";
        }     
      ?>
      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
          <a href="dashboard.php" class="btn btn-outline-primary" role="button">Cancel</a>
        </div>
      </div>
    </form>
    </div>
    </div>
  </div>
  <div class="right-section">
    <div class="nav">
      <button id="menu-btn">
        <span class="material-icons-sharp">
          menu
        </span>
      </button>
      <div class="dark-mode">
        <span class="material-icons-sharp active">
          light_mode
        </span>
        <span class="material-icons-sharp">
          dark_mode
        </span>
      </div>          
    </div>
    <!-- End of Nav -->
  </div>     
    
  <footer class="foot">
    <p>&copy; 2023 Tabernacle of Grace Church</p>
  </footer>
  <script src="Scripts/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>