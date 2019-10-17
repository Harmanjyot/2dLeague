<?php
require "../php/conn.php";
session_start();
if(isset($_SESSION["adminType"]))
{

?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="stylesheet" href="css/login.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/login.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div style="float: right;">
    <form method="POST" action="../misc/action_logout.php">
      <button type="submit">Logout</button>
    </form>
  </div>
        <div class="container">
          <h1>2D League</h1>
          <div class="table-responsive" style="background-color: white;">
            <div id = "live_data"></div>
          </div>
        </div>
              
              <div class="bottom-container">
               
              </div>


<script>
   $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }
      fetch_data();
      $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id5");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                  url:"delete.php",  
                  method:"POST",  
                  data:{id:id},  
                  dataType:"text",  
                  success:function(data){  
                      fetch_data();  
                  }  
            });  
        }  
      });  
  });  
        

</script>

</body>
</html>

<?php
}
else{
  echo "PAGE DOES NOT EXIST!";
}
?>