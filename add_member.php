<?php
  @include 'dbconnection.php';
  $Name = "";  
  $Phone = "";
  $Email = "";
  $Address = "";
  $errorMessage = "";
  $successMessage ="";

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $Name = $_POST["Name"];
  $Phone = $_POST["Phone"];
  $Email = $_POST["Email"];
  $Address = $_POST["Address"];

  do{
    if( empty($Name)|| empty($Phone) || empty($Email) || empty($Address) ){
      $errorMessage = "All the fields are required";
      break;
    }
    // add new client to the database
    $sql = "INSERT INTO members (Name, Phone, Email, Address)"."VALUES ('$Name', '$Phone', '$Email', '$Address')";
    $result =$conn->query($sql);

    if(!$result){
      $errorMessage = "Invalid query:" . $conn->error;
      break;
    }

    $Name = "";  
    $Phone = "";
    $Email = "";
    $Address = "";
    $successMessage = "Member added correctly";

    header("location: register.php");
    exit;
    
  } while(false);
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabernacle of Grace Church</title>
  <link rel="shortcut icon" type="favicon" href="images/logo.jpg"/>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Styles/footer.css">
  <link rel="stylesheet" href="Styles/dashboard.css"> 
  <link rel="stylesheet" href="Styles/addMember.css">
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
          <a href="dashboard.php" >
            <span class="material-icons-sharp">
              dashboard
            </span>
            <h3>Dashboard</h3>
          </a>
          <a href="register.php" class="active">
            <span class="material-icons-sharp">
              add
            </span>
            <h3>Add Member</h3>
          </a>
          <a href="Bank.php">
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
    <div class="containe ">
      <h2>Register New member</h2>
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
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col sm 6">
            <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Address</label>
          <div class="col sm 6">
            <input type="text" class="form-control" name="Address" value="<?php echo $Address; ?>">
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
            <a href="register.php" class="btn btn-outline-primary" role="button">Cancel</a>
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