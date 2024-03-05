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
  <link rel="stylesheet" href="Styles/Reg.css"> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <style>
    
    tbody{
      color: black;
    }
    .register{
      display: grid;
      width: 96%;
      margin: 0 auto;
      gap: 1.8rem;
      grid-template-columns: 12rem 80%;
      
    }
  </style>
</head>
<body>
  <div class="register">
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
      <div class="recent_orders">
        <h2>Member registration</h2>
        <a class="btn btn-primary" href="add_member.php" role="button">Add member</a>
        <br><br>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Address</th>
              <th>Created_at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>        
            <?php @include 'dbconnection.php';
              //read all row from database table
              $sql = "SELECT * FROM members";
              $result = $conn->query($sql);
              if(!$result){
                die("Invalid query: " . $conn->error);
              }
              //read data of each row
              while($row = $result -> fetch_assoc()){
                echo "
                <tr>
                  <td>$row[ID]</td>
                  <td>$row[Name]</td>
                  <td>$row[Phone]</td>
                  <td>$row[Email]</td>
                  <td>$row[Address]</td>
                  <td>$row[Created_at]</td>
                  <td>
                    <a class='btn btn-primary btn-sm' href='editMember.php?ID=$row[ID]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='remove_member.php?ID=$row[ID]'>Delete</a>
                  </td>
                </tr>
                ";
              }
            ?>          
          </tbody>
        </table>
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
  <footer class="foot">
    <p>&copy; 2023 Tabernacle of Grace Church</p>
  </footer>
  <script src="Scripts/index.js"></script>
</body>
</html>

