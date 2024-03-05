<?php
  @include 'dbconnection.php';
  $ID = "";
  $Category = "";  
  $Amount = "";
  $Deposit_by = "";
  $errorMessage = "";
  $successMessage ="";

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //GET Method to display the data of a member 
    if (!isset($_GET["ID"])){
      header("Location: Bank.php");
      exit;
    }
    $ID = $_GET["ID"];
    //read the row of the selected member from the db
    $sql ="SELECT * FROM bank_deposit WHERE ID=$ID";
    $result = $conn ->query($sql);
    $row = $result ->fetch_assoc();
    if(!$row){
      header("location: Bank.php");
      exit;
    }
    $Category = $row["Category"];
    $Amount = $row["Amount"];
    $Deposit_by = $row["Deposit_by"];
  }else{
    //POST method update the data of deposit
    $ID =$_POST["ID"];
    $Category = $_POST["Category"];
    $Amount = $_POST["Amount"];
    $Deposit_by = $_POST["Deposit_by"];

    do{
      if( empty($Category)|| empty($Amount) || empty($Deposit_by) ){
        $errorMessage = "All the fields are required";
        break;
      }
      $sql = "UPDATE bank_deposit ".
        "SET Category = '$Category', 
          Amount='$Amount', 
          Deposit_by='$Deposit_by'".
        "WHERE ID ='$ID' ";
      $result = $conn ->query($sql);

      if(!$result){
        $errorMessage="Invalid query: ". $conn->error;
        break;
      }
      $successMessage = "Deposit updated correctly";
      header("location: Bank.php");
      exit;
    }while(true);
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
  <link rel="stylesheet" href="Styles/editMember.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <style>
    .edit_deposit{
      display: grid;
      width: 96%;
      margin: 0 auto;
      gap: 1.8rem;
      grid-template-columns: 12rem 60%;
    }
  </style>
</head>
<body>
  <div class="edit_deposit">
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
        <a href="register.php" >
          <span class="material-icons-sharp">
          person_outline
          </span>
          <h3>Member registration</h3>
        </a>
        <a href="Bank.php" class="active">
          <span class="material-icons-sharp">
            edit
          </span>
          <h3>update bank deposits</h3>
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
    <main>
      <div class="recent-orders">
        <h2>Update deposits</h2>
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
            <label class="col-sm-3 col-form-label">Category</label>
            <div class="col sm 6">
              <select class="form-control" name="Category" value="value="<?php echo $Category; ?>">
                <option class="dropdown-item" value="cash">Cash</option>
                <option class="dropdown-item" value="cheque">Cheque</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Amount</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Amount" value="<?php echo $Amount; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Deposit_by</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Deposit_by" value="<?php echo $Deposit_by; ?>">
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
              <a href="Bank.php" class="btn btn-outline-primary" role="button">Cancel</a>
            </div>
          </div>
        </form>
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
    <p>&copy; 2023 Tabernacle of Grace Church</p>
  </footer>
  <script src="Scripts/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>