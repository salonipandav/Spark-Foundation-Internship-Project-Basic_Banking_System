<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
body{
  margin:0;
  border:0;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('BANK2.jpg');
  background-size:100% 100%;
  background-attachment: fixed;
}
</style>
</head>
<body>
<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "", "spbank");
	if(!$con)
	{
		die("Connection failed");
	} 
	$flag=false;
	if (isset($_POST['transfer']))
		{
			$sender=$_SESSION['sender'];
			$reciever=$_POST["reciever"];
			$amount=$_POST["amount"];
		}
	
	?>

		<?php
		
		$result = $con->query("SELECT Balance FROM `customers details` WHERE Name='$sender'");
	    $bal=$result->num_rows ;
		
		if ($bal> 0) 
			{
				while($row = $result->fetch_assoc())
					{
						
						if($amount>$row["Balance"] or $row["Balance"]-$amount<0)
							{
								echo "<script>swal( 'Try again','INSUFFICIENT BALANCE!','error' ).then(function() { window. location = 'customers details.php'; });;</script>";
							}
						else
							{
								$sql = "UPDATE `customers details` SET Balance=(Balance-$amount) WHERE Name='$sender'";
								if ($con->query($sql) === TRUE) 
									{
										$flag=true;
									} 
								else 
									{
										echo "Error updating record: " . $conn->error;
									}
							}
 
					}
			}
			else
			{
				echo "0 results";
			} 
		if($flag==true)
			{
				$sql = "UPDATE `customers details` SET Balance=(Balance+$amount) WHERE Name='$reciever'";
				if ($con->query($sql) === TRUE)
					{
						$flag=true;  
					} 
				else
					{
						echo "Error updating record: " . $con->error;
					}
			}
		if($flag==true)
			{
				
				$sql="INSERT INTO `transition details`(`Sender`, `Reciever`, `Amount Transferred`, `Date and Time`) VALUES ('$sender','$reciever','$amount',CURRENT_TIMESTAMP)";
				if ($con->query($sql) === TRUE) 	
					{
					}
				else 
					{
						echo "Error updating record: " . $con->error;
					}
			}
		if($flag==true)
			{

				echo "<script>swal('Done!', 'TRANSACTION SUCCESSFULL..!!!','success').then(function() { window. location = 'history.php'; });;</script>";
			}
			
		else if($flag==false)
			{
                echo "<script> $('#').show()</script>";
			}
	?>
	</body>
</html>
