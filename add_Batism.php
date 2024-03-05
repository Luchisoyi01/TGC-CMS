<?php
  @include 'dbconnection.php';
  $Name = "";  
  $Age = "";
  $Phone = "";
  $Email = "";
  $Baptism_date = "";
  $errorMessage = "";
  $successMessage ="";

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $Name = $_POST["Name"];
  $Age = $_POST["Age"];
  $Phone = $_POST["Phone"];
  $Email = $_POST["Email"];
  $Baptism_date = $_POST["Baptism_date"];
  do{
    if( empty($Name)|| empty($Age) || empty($Phone) || empty($Email) || empty($Baptism_date)  ){
      $errorMessage = "All the fields are required";
      break;
    }
    // add new client to the database
    $sql = "INSERT INTO baptism (Name, Age, Phone, Email, Baptism_date)"."VALUES ('$Name', '$Age', '$Phone', '$Email','$Baptism_date' )";
    $result =$conn->query($sql);

    if(!$result){
      $errorMessage = "Invalid query:" . $conn->error;
      break;
    }
    $Name = "";  
    $Age = "";
    $Phone = "";
    $Email = "";
    $Baptism_date ="";
    $successMessage = "Baptism added correctly";

    header("location: event.php");
    exit;
    
  } while(false);
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta Name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabernacle of Grace Church</title>
  <link rel="shortcut icon" type="favicon" href="images/logo.jpg"/>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Styles/footer.css">
  <link rel="stylesheet" href="Styles/dashboard.css">  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <style>
    .add_baptism{
      display: grid;
      width: 96%;
      margin: 0 auto;
      gap: 1.8rem;
      grid-template-columns: 12rem 80% 5%;
    }
    a {
      text-decoration: none;
    }
    h4{
      font-size: small;
    }
  </style>
</head>
<body>
  <div class="add_baptism">
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
          <a href="dashboard.php">
            <span class="material-icons-sharp">
              dashboard
            </span>
            <h3>Dashboard</h3>
          </a>
          <a href="register.php">
            <span class="material-icons-sharp">
              person_outline
            </span>
            <h3>Member registration</h3>
          </a>
          <a href="Bank.php">
            <span class="material-icons-sharp">
              receipt_long
            </span>
            <h3>Bank deposits</h3>
          </a>
          <a href="event.php" class="active">
            <span class="material-icons-sharp">
              add
            </span>
            <h3>Add baptism</h3>
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
    <main>
      <div class="recent-orders">
        <div class="containe">
        <h2>Add baptism details</h2>
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
          <input type="hidden" Name="ID" value="<?php echo $ID; ?>">
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Name" value="<?php echo $Name; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Age</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Age" value="<?php echo $Age; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Phone" value="<?php echo $Phone; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Baptism_date</label>
            <div class="col sm 6">
              <input type="date" class="form-control" name="Baptism_date" value="<?php echo $Baptism_date; ?>">
            </div>
          </div>
          <?php 
            if (!empty($successMessage)) {
              echo "
                <div class='row mb-2'>
                  <div class='offset-sm-2 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong> $successMessage </strong>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                    </div>
                  </div>
                </div>                
              ";
            }     
          ?>
          <div class="row mb-2">
            <div class="offset-sm-2 col-sm-3 d-grid">
              <button class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
              <a href="event.php" class="btn btn-outline-primary" role="button">Cancel</a>
            </div>
          </div>
        </form>
        </div>
      </div>
    </main>
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
    </div>
  </div> 
  <footer class="foot">
    <p>&copy; 2022 Tabernacle of Grace Church</p>
  </footer>
  <script src="Scripts/index.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </div>
</body>
</html>