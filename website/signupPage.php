<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/reg.css'>
    <script> 
          
        // Function to check Whether both passwords 
        // is same or not. 
        function Validate() {
        var password = document.getElementById("password1").value;
        var confirmPassword = document.getElementById("password2").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
    </script>
</head>
<body>
        <div class="container">
                <form action="misc/action_signup.php" method="POST">
                  <h1>2D League</h1>
                  <div  id="grad">
                     
                    <div class="row">
                    <h2 style="text-align:center">SIGN UP</h2>
                      <input type="email" name="email" placeholder="Email" required>
                      <input type="text" name="username" placeholder="Username" required>
                      <!-- I ADDED NAME="PASSWORD1" ON THE LINE BELOW, NOTHING HAPPENED. SOME ERROR ON LINE 8 OF SIGNUP.PHP -->
                      <input type="password" id="password1" name="pwd" placeholder="Password" required>
                      <input type="password" id="password2" name="pwd" placeholder="Confirm Password" required>

                      <br>
                      <centre><button type="submit" name="Login" onclick="return Validate()">SIGN UP</button></centre>
                      <br>
                      <br>
                      <div class="row">
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