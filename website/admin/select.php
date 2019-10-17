<?php  
 require "../php/conn.php";
 $output = '';  
 $sql = "SELECT * FROM playerDetails";  
 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Sr. No</th>  
                     <th width="20%">Username</th>  
                     <th width="10%">Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  $count = 1;
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$count.'</td>  
                     <td data-id1="'.$row["userID"].'">'.$row["userName"].'</td>  
                     <td><button type="button" name="delete_btn" data-id5="'.$row["userID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
           $count = $count + 1;
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td></td>  
                <td></td>    
           </tr>  
      ';  
 }  

 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>