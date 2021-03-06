<?php

  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>To add list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <header>
          <!-- Start Navbar -->
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
        <a class="nav-link" href="user.php">User</a>
    </li>
</ul>
</nav>
<!-- End Navbar -->
<!-- Content -->

  <?php

require('includes/connect.php');
require('includes/class.php');

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = new USER();


  $user->photo = stripslashes($_REQUEST['photo']);
  $user->photo = mysqli_real_escape_string($conn, $user->photo);

  $user->ChangePhoto($_GET['id'], $user->photo,$conn);



    }

  ?>
<section class="container-fluid ">
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-3">
  <form class="form-container" action="" method="post">
  <h1>Edit image </h1>
  <input type="text" class="form-control" name="photo" value="<?php echo $_SESSION["photo"] ?>" required />
  <input type="submit" name="submit" value="Update" class="btn btn-primary btn-block" />
</form>
         
        </form>
      </section>
    </section>
  </section>
<!-- End Content -->

      </header>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>