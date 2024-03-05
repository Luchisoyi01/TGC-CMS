<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <title>Tabernacle of Grace Church</title>
  <link rel="shortcut icon" type="favicon" href="images/logo.jpg"/>
  <link rel="stylesheet" href="Styles/dashboard.css"> 
  <link rel="stylesheet" href="Styles/footer.css">
  <style>
    .event{
      display: grid;
      width: 96%;
      margin: 0 auto;
      gap: 1.8rem;
      grid-template-columns: 12rem 80% 5%;
    }
  </style>
</head>
<body>
  <div class="event">
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
        <h2>Marriage</h2>       
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Groom_name</th>
              <th>Groom_phone</th>
              <th>Bride_name</th>  
              <th>Bride_phone</th>
              <th>Marriage_date</th>
              <th>Officiator</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php @include 'dbconnection.php';
              //read all row from database table
              $sql = "SELECT * FROM Marriage";
              $result = $conn->query($sql);
              if(!$result){
                die("Invalid query: " . $conn->error);
              }
              //read data of each row
              while($row = $result -> fetch_assoc()){
                echo "
                <tr>
                  <td>$row[ID]</td>
                  <td>$row[Groom_name]</td>
                  <td>$row[Groom_phone]</td>
                  <td>$row[Bride_name]</td>
                  <td>$row[Bride_phone]</td>
                  <td>$row[Marriage_date]</td>
                  <td>$row[Officiator]</td>                  
                  <td>
                    <a class='btn btn-primary btn-sm' href='edit_Marriage.php?ID=$row[ID]'>
                    <span class='material-icons-sharp'>
                      edit
                    </span>
                    </a>                    
                  </td>
                  <td>                    
                    <a class='btn btn-primary btn-sm' href='remove_marriage.php?ID=$row[ID]'>
                    <span class='material-icons-sharp'>
                      remove
                    </span>
                    </a>                  
                  </td>
                </tr>
                ";
              }
            ?>
          </tbody>
        </table>
        <a href="add_marriage.php"><h3>Add Marriage</h3></a> 
        <h2>Baptism</h2>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Age</th>
              <th>Phone</th>
              <th>Email</th>              
              <th>Baptism_date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php @include 'dbconnection.php';
              //read all row from database table
              $sql = "SELECT * FROM Baptism";
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
                  <td>$row[Age]</td>
                  <td>$row[Phone]</td>
                  <td>$row[Email]</td>
                  <td>$row[Baptism_date]</td>            
                  <td>
                    <a class='btn btn-primary btn-sm' href='edit_Baptism.php?ID=$row[ID]'>
                    <span class='material-icons-sharp'>
                      edit
                    </span>
                    </a>                    
                  </td>
                  <td>                    
                    <a class='btn btn-primary btn-sm' href='remove_Baptism.php?ID=$row[ID]'>
                    <span class='material-icons-sharp'>
                      remove
                    </span>
                    </a>                  
                  </td>
                </tr>
                ";
              }
            ?>
          </tbody>
        </table>
        <a href="add_Batism.php"><h3>Add Baptism</h3></a> 
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
</body>
</html>