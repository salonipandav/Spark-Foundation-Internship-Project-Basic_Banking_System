<?php
	session_start();  //Start the session
    $con = mysqli_connect("localhost", "root", "", "spbank"); //database connection establish
	if(!$con)
		{
			die("Connection failed");
		}
	//Set session variable
	$_SESSION['user']=$_POST['user'];
	$_SESSION['sender']=$_SESSION['user'];
	if (isset($_SESSION['user']))   //check variable is declare or empty
		{
			$user=$_SESSION['user'];
		}
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
  color: cyan;
  text-align: center;
  padding: 22px 22px;
  text-decoration: none;
  font-size: 21px;
}

.menu a:hover {
  background-color: #ddd;
  color: black;
}

.container{
          
    max-width: 100%; 
    padding: 18px; 
    margin: auto;
	float: center;
}

.container h3 {
    text-align: center;
    font-family: 'Algerian', cursive;
    font-size: 32px;
	padding:3;
	color:#B22222;
}

input,select{
    
    border: 2px solid black;
    border-radius: 6px;
    outline: none;
    font-size: 16px;
    width: 20%;
    margin: 3px;
    padding: 3px;
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}


.btn{
    color: white;
    background: Orange;
    padding: 8px 12px;
    font-size: 15px;
    border: 2px solid white;
    border-radius: 14px;
    cursor: pointer;
}
label{
	color:darkmagenta;
	font-size: 18px;
}



</style>
</head>
<body>
	<div class="menu">
		<a href="index.html">Home</a>
		<a href="customers details.php">Customers Details</a>
		<a href="history.php">transition details</a>
			
		
		
	</div>

<div class="container">
	<form action="transaction success.php" method="post">
        <h3 >MONEY TRANSACTION</h3>
		
		      <b><label for="text">Sender:</label></b>
		      <input type="text" id="cname" name="sender" value='<?php echo "$user";?>'><br><br>
		
		      <b><label for="text">Reciever:</label></b>
			  <select  name="reciever" id="dropdown" required>
						<option value="">Select Reciever</option>
						<?php
							$db = mysqli_connect("localhost", "root", "", "spbank");
							$res = mysqli_query($db, "SELECT * FROM `customers details` WHERE Name!='$user'");
							while($row = mysqli_fetch_array($res))
								{
									echo("<option> "."  ".$row['Name']."</option>");
								}
						?>
					</select><br><br>
			  <b><label for="email">E-mail:</label></b>
			  					<select  name="email" id="dropdown" required>
						<option value="">Select email</option>
						<?php
							$db = mysqli_connect("localhost", "root", "", "spbank");
							$res = mysqli_query($db, "SELECT * FROM `customers details` WHERE Name!='$user'");
							while($row = mysqli_fetch_array($res))
								{
									echo("<option> "."  ".$row['E-mail']."</option>");
								}
						?>
					</select><br><br>
              <b><label for="number">A/c no:</label></b>
              <input type="number" name="A/c no" id="A/c no" placeholder="Enter A/c no"><br><br>
			
			  <b><label for="text">Amount:</label></b>
              <input type="number" name="amount" id="amount" placeholder="Enter Amount"><br><br>
			
		
		<a href ="transaction success.php"><button class="btn" id="transfer" name="transfer">Transfer Money</button></a>
        </form>
		</div>
		</body>
</html>