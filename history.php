<?php
    $con = mysqli_connect("localhost", "root", "", "spbank");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
body{
	margin:0;
  border:0;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('BANK2.jpg');
  background-size:100% 100%;
  background-attachment: fixed;
}
.menu {
  overflow: hidden;
  background-color: #333;
}

.menu a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 22px 22px;
  text-decoration: none;
  font-size: 21px;
}

.menu a:hover {
  background-color: #ddd;
  color: black;
}
.menu a.active {
  background-color: #4CAF50;
  color: white;
}
table {
    border: 2px solid blue;
	
	text-align:center;
    font-size:21px;
    font-width:bold;
}
h3{
	text-align:center;
	color:darkmagenta;
	font-family: 'Algerian';
	font-size:30px;
    padding:3;
}

</style>
</head>
<body>


<div class="menu">
  <a href="index.html">Home</a>
  <a href="customers details.php">Customers Details</a>
  <a class="active" href="#history">transition details</a>
</div>

</div><h3 >transition details</h3>
   <center> <table id="myTable" border="1" bgcolor="BurlyWood">
          <tr>
            <th>Sender</th>
            <th>Reciever</th>
			<th>Amount Transferred</th>
			<th>Date and Time</th>
            
          </tr>
		  <?php
			
			$sql = "SELECT * FROM `transition details`";
			$result = mysqli_query($con, $sql);
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<tr>";
				echo "<td>". $row['Sender'] . "</td>
					 <td>". $row['Reciever'] . "</td>
					 <td>". $row['Amount Transferred'] . "</td>
					 <td>". $row['Date and Time'] . "</td>";
				echo  "</tr>";
			}
        ?>
		  </table></center>
</body>
</html>