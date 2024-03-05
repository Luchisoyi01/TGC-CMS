<?php
  @include 'dbconnection.php';
  $ID = "";
  $Date = "";  
  $Amount = "";
  $Reason = "";
  $Expense ="";
  $Category ="";
  $errorMessage = "";
  $successMessage ="";

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //GET Method to display the data of a member 
    if (!isset($_GET["ID"])){
      header("Location: inventory.php");
      exit;
    }
    $ID = $_GET["ID"];
    //read the row of the selected member from the db
    $sql ="SELECT * FROM expense WHERE ID=$ID";
    $result = $conn ->query($sql);
    $row = $result ->fetch_assoc();
    if(!$row){
      header("location: inventory.php");
      exit;
    }
    $Date = $row["Date"];
    $Amount = $row["Amount"];
    $Reason = $row["Reason"];
    $Expense = $row["Expense"];
    $Category = $row["Category"];
  }else{
    //POST method upDate the data Baptism
    $ID =$_POST["ID"];
    $Date = $_POST["Date"];
    $Amount = $_POST["Amount"];
    $Reason = $_POST["Reason"];
    $Expense = $_POST["Expense"];
    $Category = $_POST["Category"];

    do{
      if( empty($Date)|| empty($Amount) || empty($Reason) || empty($Expense) || empty($Category) ){
        $errorMessage = "All the fields are required";
        break;
      }
      $sql = "UPDATE expense ".
        "SET Date = '$Date', 
          Amount='$Amount', 
          Reason='$Reason',
          Expense='$Expense',
          Category='$Category'".
        "WHERE ID ='$ID' ";
      $result = $conn ->query($sql);
      if(!$result){
        $errorMessage="Invalid query: ". $conn->error;
        break;
      }
      $successMessage = "Expence details upDated correctly";
      header("location: inventory.php");
      exit;
    }while(true);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta Date="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabernacle of Grace Church</title>
  <link rel="shortcut icon" type="favicon" href="images/logo.jpg"/>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Styles/footer.css">
  <link rel="stylesheet" href="Styles/dashboard.css">  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <style>
    .edit_expense{
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
  <div class="edit_expense">
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
          <a href="event.php" >
            <span class="material-icons-sharp">
              event
            </span>
            <h3>Events</h3>
          </a>
          <a href="inventory.php" class="active">
              <span class="material-icons-sharp">
                edit
              </span>
              <h3>Update Expense</h3>
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
        <h2>Update Expense</h2>
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
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Date</label>
            <div class="col sm 6">
              <input type="Date" class="form-control" name="Date" value="<?php echo $Date; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Amount</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Amount" value="<?php echo $Amount; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Reason</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Reason" value="<?php echo $Reason; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Expense</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Expense" value="<?php echo $Expense; ?>">
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col sm 6">
              <input type="text" class="form-control" name="Category" value="<?php echo $Category; ?>">
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
              <a href="inventory.php" class="btn btn-outline-primary" role="button">Cancel</a>
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
</body>
</html>