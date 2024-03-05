
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Styles/footer.css">
  <title>Tabernacle of Grace Church</title>
  <link rel="shortcut icon" type="favicon" href="images/logo.jpg"/>
  <link rel="stylesheet" href="Styles/footer.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Styles/dashboard.css"> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <style>
    a{
      text-decoration: none;
    }
    .bank{
      display: flex;
    }
    .aside_content{
      display: flex;
      position: absolute;
      left: 10px;
      width: 12%; 
    }
    .nav{
      position: absolute;
      right: 5px;
      top: 5px;
    }
    .deposit{ 
      display: flex;
      flex: 1fr;
      position: absolute;
      left: 100px;
      right: 0px;        
    }
    .aside_content{
      display: flex;
      position: absolute;
      left: 10px;
      width: 12%; 
    }
    .containe{ 
      position: absolute;
      left: 8%;
      right: 10%;
    }
    h4{
      font-size: small;
    }
    .bank_deposit{
      padding-top: 20px;
      padding-bottom: 5px;
    }
  </style>
</head>
<body>
  <div class="bank">
    <div class="bank_aside">
    <div class="aside_content">
    <div class="continer">
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
          <a href="register.php">
            <span class="material-icons-sharp">
              person_outline
            </span>
            <h3>Member registration</h3>
          </a>
          <a href="Bank.php" class="active">
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
    </div>
    </div>    
    <div class="deposit">
      <div class="recent-orders containe md-5">
        <h2 class="bank_deposit">Add Bank Deposit</h2>
        <a class="btn btn-primary" href="add_deposit.php" role="button">Add Deposit</a>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category</th>
              <th>Amount</th>
              <th>Deposit_by</th>
              <th>Created_at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>        
            <?php @include 'dbconnection.php';
              //read all row from database table
              $sql = "SELECT * FROM Bank_deposit";
              $result = $conn->query($sql);
              if(!$result){
                die("Invalid query: " . $conn->error);
              }
              //read data of each row
              while($row = $result -> fetch_assoc()){
                echo "
                <tr>
                  <td>$row[ID]</td>
                  <td>$row[Category]</td>
                  <td>$row[Amount]</td>
                  <td>$row[Deposit_by]</td>
                  <td>$row[Created_at]</td>
                  <td>
                    <a class='btn btn-primary btn-sm' href='edit_deposit.php?ID=$row[ID]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='remove_deposit.php?ID=$row[ID]'>Delete</a>
                  </td>
                </tr>
                ";
              }
            ?>          
          </tbody>
        </table>
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
  </div>  
  <script src="Scripts/index.js"></script>
</body>
</html>