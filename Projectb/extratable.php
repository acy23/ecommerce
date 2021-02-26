<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>


<div align="center">
<h2>Selected Item and Information</h2>
<style>
table, th, td {
  border: 1px solid black;
}

table {
  width: 65%;
}
</style>

<table class="center">
  <tr>
    <th>Item</th>
    <th>Price</th>
    <th>Prdouct ID</th>
    <th>Customer ID</th>
  </tr>
  <tr>
    
      <?php 
      
      $sqll = "SELECT * FROM product WHERE Product_ID = '$myvar' "; 
      $resultt = mysqli_query($db, $sqll);    
      while ($roww = mysqli_fetch_assoc($resultt)) {
        $cid = $_SESSION['customerID'];
        $myname = $roww['Product_Name'];
        $myprice = $roww['Price'];
        $myid = $roww['Product_ID'];

        echo "<tr>" . "<td>" . $myname . "</td>" . "<td>" . $myprice . "</td>" . "<td>" . $myid . "</td>" . "<td>" . $cid . "</td>" .      "</tr>";
      }
      
      ?>
        
  </tr>
</table>
</html>