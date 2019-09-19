<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/reg.css'>
    <script src='main.js'></script>
    <script> 
          
        // Function to check Whether both passwords 
        // is same or not. 
        function checkPassword(form) { 
            password1 = form.password1.value; 
            password2 = form.password2.value; 

            // If password not entered 
            if (password1 == '') 
                alert ("Please enter Password"); 
                  
            // If confirm password not entered 
            else if (password2 == '') 
                alert ("Please enter confirm password"); 
                  
            // If Not same return False.     
            else if (password1 != password2) { 
                alert ("\nPassword did not match: Please try again...") 
                return false; 
            } 

            // If same return True. 
            else{ 
                alert("Password Match") 
                return true; 
            } 
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
                      <input type="password" name="password1" placeholder="Password" required>
                      <input type="password" name="password2" placeholder="Confirm Password" required>

                      <br>
                      <centre><button type="submit" name="Login">SIGN UP</button></centre>
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