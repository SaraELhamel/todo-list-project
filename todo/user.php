<?php
  session_start();
  require('includes/connect.php');
    require('includes/class.php');
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
  }
?>

<!doctype html>
<html lang="en">

<head>
    <title>user page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
   
        
        <nav class="navbar-1">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="to do.php">Home</a>
                </li>
                <li class="nav-item">

                    <?php
          if(!isset($_SESSION["username"])){
            echo '<a class="nav-link" href="login.php">Login</a>';
          }else {
            echo '<a class="nav-link" href="logout.php">Logout</a>';
          }
        ?>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user.php"><?php echo htmlspecialchars($_SESSION["username"]); ?> </a>
                </li>
                <li>
                    <a href="user.php">
                        <?php

              $sql = "SELECT * FROM users WHERE id = '{$_SESSION[ "id" ]}'";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();

           echo '<img src="' . $row["photo"] . '" class="nav-link rounded-circle z-depth-0" alt="Image" height="50">';
          ?>

                    </a>
                </li>
            </ul>
        </nav>
    <div class=user>
      <?php
        echo '<img src="'.$row["photo"].'" width="100px" class="profile" alt="...">';
       ?>
       <h3 for="">ABOUT USER</h3>
    <p>First name :  <?php echo $row["firstname"]; ?></p>
    <p>Last name :  <?php echo $row["lastname"]; ?></p>
    <p>Username :  <?php echo $row["username"]; ?></p>
    <p>Email :  <?php echo $row["email"]; ?></p>
    <p>Password : <a class="info" href="updatepassword.php?id=<?php echo $_SESSION['id'] ?>"> update password</a></p>
    <a href="updateimage.php?id=<?php echo $_SESSION['id'] ?>" class="edituser">Update Photo</a>
    <a href="updateinfo.php?id=<?php echo $_SESSION['id'] ?>" class="edituser">Update User</a>
    </div>
</body>
</html>