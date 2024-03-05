<?php 
 session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['UserName'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <link rel="stylesheet" href="Styles/dashboard.css"> 
  <link rel="stylesheet" href="Styles/footer.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <title>Tabernacle of Grace Church</title>
  <link rel="shortcut icon" type="favicon" href="images/logo.jpg"/>
</head>

<body>
  <div class="container">
    <!-- Sidebar Section -->
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
    <!-- End of Sidebar Section -->
    <!-- Main Content -->
    <main>
      <h1>Analytics</h1>
      <!-- Analyses -->
      <div class="analyse">
        <div class="offering">
          <div class="status">
            <div class="info">
              <h3>Total Pledges</h3>              
              <h1>
                <?php 
                  @include 'dbconnection.php';
                  $sql = "SELECT SUM(pledge) as total_money FROM pledges";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['total_money'];
                  } else {
                    echo "0 results";
                  }
                  $conn->close();
                ?>
              </h1>
            </div>
            <div class="progresss">
              <svg>
                <circle cx="38" cy="38" r="36"></circle>
              </svg>
              <div class="percentage">
                <p>+81%</p>
              </div>
            </div>
          </div>
        </div>
          <div class="female_members">
            <div class="status">
              <div class="info">
                <h3>Bank deposits</h3>
                <h1>
                  <?php 
                    @include 'dbconnection.php';
                    $sql = "SELECT SUM(Amount) as total_money FROM bank_deposit";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo $row['total_money'];
                    } else {
                      echo "0 results";
                    }
                    $conn->close();
                  ?>
                </h1>
              </div>
              <div class="progresss">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="percentage">
                  <p>+48%</p>
                </div>
              </div>
            </div>
          </div>
          <div class="male_members">
            <div class="status">
              <div class="info">
                <h3>Members</h3>
                <h1>
                <?php 
                  @include 'dbconnection.php';
                  $sql = "SELECT COUNT(ID) as total_members  FROM members";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['total_members'];
                  } else {
                    echo "0 results";
                  }
                  $conn->close();
                ?>
                </h1>
              </div>
              <div class="progresss">
                <svg>
                  <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="percentage">
                  <p>+53%</p>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- End of Analyses 
      Recent Orders Table -->
      <div class="recent-orders">
        <h2>Pledges</h2>       
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Pledge</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php @include 'dbconnection.php';
              //read all row from database table
              $sql = "SELECT * FROM Pledges";
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
                  <td>$row[Pledge]</td>
                  <td>
                    <a class='btn btn-primary btn-sm' href='edit_Pledge.php?ID=$row[ID]'>
                    <span class='material-icons-sharp'>
                      edit
                    </span>
                    </a>                    
                  </td>
                  <td>                    
                    <a class='btn btn-primary btn-sm' href='remove_Pledge.php?ID=$row[ID]'>
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
        <a href="add_pledge.php"><h3>Add Pledge</h3></a> 
      </div>
      <!-- End of Recent Orders -->      
    </main>
    <!-- End of Main Content -->
    <!-- Right Section -->
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
          <div class="profile">
              <div class="info">
                <p>Hey, <?php echo $_SESSION['Name']; ?></p>
                <small class="text-muted">Admin</small>
              </div>
              <div class="profile-photo">
                <img src="images/admin.jpg">
              </div>
          </div>
        </div>
        <!-- End of Nav -->

        <div class="user-profile">
            <div class="logo">
                <img src="images/logo.jpg">
                <h4>Tabernacle of Grace Church</h4>      
            </div>
        </div>
        <div class="reminders">
          <div class="header">
              <h2>Church weekly Services</h2>
              <span class="material-icons-sharp">
                notifications_none
              </span>
          </div>
          <div class="notification">
              <div class="icon">
                <span class="material-icons-sharp">
                  volume_up
                </span>
              </div>
              <div class="content">
                  <div class="info">
                    <h3>Sunday Service</h3>
                    <small class="text_muted">
                      10:00 AM - 12:00 PM
                    </small>
                  </div>
                  <span class="material-icons-sharp">
                    more_vert
                  </span>
              </div>
          </div>
          <div class="notification deactive">
            <div class="icon">
              <span class="material-icons-sharp">
                volume_up
              </span>
            </div>
            <div class="content">
                <div class="info">
                  <h3>Wednesday</h3>
                  <small class="text_muted">
                    05:00 PM - 06:00 PM
                  </small>
                </div>
                <span class="material-icons-sharp">
                  more_vert
                </span>
            </div>
          </div>
        </div>
      </div>
  </div>
  <footer class="foot">
    <p>&copy; 2023 Tabernacle of Grace Church</p>
  </footer>
  <script src="orders.js"></script>
  <script src="Scripts/index.js"></script>
</body>
</html>
<?php 
}else{
  header("Location: index.php");
  exit();
}
?>