<?php
 require "php/conn.php";
 session_start(); 
 if (isset($_SESSION["playerID"])) {

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Begin!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
    <script src='main.js'></script>
</head>
<body>
    <div id="title">
        <p id="bar"></p>
        <h1>2D League</h1>
        <div style="float: right;">
            <form method="POST" action="misc/action_logout.php">
                <button id="logout" type="submit" name="logout">LOGOUT</button>
            </form>
            <form method="POST" action="stats.php">
                <button id="logout" type="submit" name="logout">STATS</button>
            </form>
        </div>
        
        
    </div>
    <div class="container">
        <form action="2dpong/public/gamepage.php" method="POST">
                  <div  id="grad">
                     
                    <div class="row">
                    <h2 style="text-align:center">Enter username of player 2 to begin!</h2>
                      <input type="text" name="username" placeholder="Username" required>
                      <input type="password" name="password" placeholder="Password" required>
                      <br>
                      <centre><button type="submit" name="Login">Play</button></centre>
                      <br>
                    </div>
                  </div>

        </form>
    </div>
    
    </body>
</html>

<?php
}
?>