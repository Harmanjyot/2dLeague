<?php 
require "php/conn.php";
  if (isset($_GET["vkey"])) {
    $vky = mysqli_escape_string($conn, $_GET["vkey"]);

    $sql = "UPDATE verified set status = '1' where vkey = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"s", $vky);
    mysqli_stmt_execute($stmt);

    $sql = "SELECT * from verified where vkey = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"s", $vky);
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);

    $sql = "INSERT INTO playerdetails(userID, userName, emailID, Password) VALUES(?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"isss", $row["userID"] , $row["userName"], $row["email"], $row["Password"]);
    mysqli_stmt_execute($stmt);

    $sql = "INSERT INTO matchesPlayed(userID) VALUES(?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"i", $row["userID"]);
    mysqli_stmt_execute($stmt);

    $sql = "INSERT INTO playerScore(userID) VALUES(?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"i", $row["userID"]);
    mysqli_stmt_execute($stmt);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
    <script src='main.js'></script>
</head>
<body>
        <div class="container">
                <form action="misc/action_login.php" method="POST">
                  <h1>2D League</h1>
                  <div  id="grad">
                     
                    <div class="row">
                    <h2 style="text-align:center">LOGIN</h2>
                      <input type="text" name="username" placeholder="Username" required>
                      <input type="password" name="password" placeholder="Password" required>
                      <br>
                      <centre><button type="submit" name="Login">LOGIN</button></centre>
                      <br>
                      <br>
                      <div class="row">
                        <div class="col">
                          <a href="signupPage.php" style="color:white" class="btn">Sign up</a>
                        </div>
                        <div class="col">
                          <a href="pwdReset.php" style="color:white" class="btn">Forgot password ?</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
              
              <div class="bottom-container">
               
              </div>
</body>
</html>