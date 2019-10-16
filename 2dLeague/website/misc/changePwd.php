<?php 
require "../php/conn.php";
if (isset($_GET["vkey"])) {

$vky = mysqli_escape_string($conn, $_GET["vkey"]);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
    <meta charset='utf-8'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Change Password</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/login.css'>
    
</head>
<body>
        <div class="container">
                <form id = "myForm">
                  <h1>2D League</h1>
                  <div  id="grad">
                     
                    <div class="row">
                    <h2 style="text-align:center">Change Password</h2>

                      <input type="password" id = "newPass" name="pwdNew" placeholder="New Password" required>
                      <br>
                      <centre><button type="submit">Submit</button></centre>
                      <br>
                      <br>
                      <div class="row">
                        <div class="col">
                          <a href="signupPage.php" style="color:white" class="btn">Sign up</a>
                        </div>
                        <div class="col">
                          <a href="../loginPage.php" style="color:white" class="btn">Login</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
              
              <div class="bottom-container">
               
              </div>
<script>
  
  $("#myForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var newPwd = $('#newPass').val();
    var vky = "<?php echo $vky ?>" ;
    var notice = "Password has been changed";
    $.ajax({
           type: "POST",
           url: "action_changePwd.php",
           data: {newPwd:newPwd, vky:vky},
           success: function(data)
           {
               alert(notice);
           }
         });


});

</script>

</body>
</html>

<?php
}
?>