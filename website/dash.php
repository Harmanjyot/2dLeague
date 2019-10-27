<?php
 require "php/conn.php";
 session_start(); 
 if (isset($_SESSION["playerID"])) {
     $sql = "SELECT * FROM playerDetails where userID = ?";
     $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt,"i", $_SESSION["playerID"]);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>BEGIN!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/dash.css'>
</head>
<body>

    <div id="title">
        
        <h1>2D League</h1>
        <form method="POST" action="misc/action_logout.php">
        <button id="logout" type="submit" name="logout">LOGOUT</button>
        </form>
        <form method="POST" action="stats.php">
            <button id="logout" type="submit" name="logout">STATS</button>
        </form>
        <button id="help" type="submit" name="logout">HELP</button>
    </div>
    <br><br><br><br>
    <div id="grad">
        <div id="buton">
            <h2>Hi! <?php echo $row["userName"]; ?></h2>
            <div class="container">
                <form action="2dpong/public/gamepage.php" method="POST">
                          <div  id="grad1">
                             
                            <div class="row">
                            <h3 style="text-align:center">Enter username of player 2 to begin!</h3>
                              <input type="text" name="username" placeholder="Username" required>
                              <input type="password" name="password" placeholder="Password" required>
                              <br>
                              <centre><button id="play" type="submit" name="Login">Play</button></centre>
                              <br>
                            </div>
                          </div>
        
                </form>
            </div>
        </div>
    
    </div>
    </body>
</html>
<?php
}
?>