<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Forget Password</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
    <script src='main.js'></script>
</head>
<body>
        <div class="container">
                <form action="misc/action_pwdReset.php" method="POST">
                  <h1>2D League</h1>
                  <div  id="grad">
                     
                    <div class="row">
                    <h2 style="text-align:center">Forget Password</h2>
                      <input type="text" name="email" placeholder="Email ID" required>
                      
                      <br>
                      <centre><button type="submit" name="Login">Submit</button></centre>
                      <br>
                      <br>
                      <div class="row">
                        <div class="col">
                          <a href="signupPage.php" style="color:white" class="btn">Sign up</a>
                        </div>
                        <div class="col">
                          <a href="loginPage.php" style="color:white" class="btn">Login</a>
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

