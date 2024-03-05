<?php
  @include 'dbconnection.php';
  $Groom_name = "";  
  $Groom_phone = "";
  $Bride_name = "";
  $Bride_phone = "";
  $Marriage_date = "";
  $Officiator = "";
  $errorMessage = "";
  $successMessage ="";

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $Groom_name = $_POST["Groom_name"];
  $Groom_phone = $_POST["Groom_phone"];
  $Bride_name = $_POST["Bride_name"];
  $Bride_phone = $_POST["Bride_phone"];
  $Marriage_date = $_POST["Marriage_date"];
  $Officiator = $_POST["Officiator"];
  do{
    if( empty($Groom_name)|| empty($Groom_phone) || empty($Bride_name) || empty($Bride_phone) || empty($Marriage_date) || empty($Officiator) ){
      $errorMessage = "All the fields are required";
      break;
    }
    // add new client to the database
    $sql = "INSERT INTO marriage (Groom_name, Groom_phone, Bride_name, Bride_phone, Marriage_date, Officiator)"."VALUES ('$Groom_name', '$Groom_phone', '$Bride_name', '$Bride_phone','$Marriage_date', '$Officiator' )";
    $result =$conn->query($sql);

    if(!$result){
      $errorMessage = "Invalid query:" . $conn->error;
      break;
    }
    $Groom_name = "";  
    $Groom_phone = "";
    $Bride_name = "";
    $Bride_phone = "";
    $Marriage_date ="";
    $Officiator = "";
    $successMessage = "Wedding added correctly";

    header("location: event.php");
    exit;
    
  } while(false);
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta Groom_name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabernacle of Grace Church</title>
  <link rel="shortcut icon" type="favicon" href="images/logo.jpg"/>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Styles/footer.css">
  <link rel="stylesheet" href="Styles/dashboard.css">  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <style>
    .add_marriage{
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
  <div class="add_marriage">
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
            <h3>Add Wedding</h3>
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
        <h2>Add wedding ceremony details</h2>
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
          <input type="hidden" Groom_name="ID" value="<?php echo $ID; ?>">
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Groom_name</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Groom_name" value="<?php echo $Groom_name; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Groom_phone</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Groom_phone" value="<?php echo $Groom_phone; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Bride_name</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Bride_name" value="<?php echo $Bride_name; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Bride_phone</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Bride_phone" value="<?php echo $Bride_phone; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Marriage_date</label>
            <div class="col sm 6">
              <input type="date" class="form-control" name="Marriage_date" value="<?php echo $Marriage_date; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Officiator</label>
            <div class="col sm 5">
              <select class="form-control" name="Officiator" value="value="<?php echo $Officiator; ?>"> 
                <option class="dropdown-item" value="Stephen Chomba">Stephen Chomba</option>
                <option class="dropdown-item" value="Mark Juma">Mark Juma</option>
                <option class="dropdown-item" value="Watson Luchisoyi">Watson Luchisoyi</option>
              </select>
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