<?php
session_start(); // Starting Session
require_once('dbconfig.php');
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) 
			{
				echo "<script>alert('Username or Password is empty!	');
										window.location='index.php';
									</script>";
			
			}
		else
		{

			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($conn,$username);
			$password = mysqli_real_escape_string($conn,$password);
			
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($conn,"SELECT * FROM user_account WHERE password = '$password' AND username='$username'");
			$rows = mysqli_fetch_array($query);

			

				if ($rows['level_ID'] == '1') 
				{	

					$_SESSION['login_user']=$username; // Initializing Session
					header("location: admin/index.php"); //admin Level
				} 
				elseif ($rows['level_ID'] == '2') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: admin/index.php"); // student Level
					
				} 
				elseif ($rows['level_ID'] == '3') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: admin/index.php"); // teacher level

				} 
				elseif ($rows['level_ID'] == '4') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: admin/index.php"); // teacher level

				} 
				else 
				{
					echo "<script>alert('Access Denied!	');
										window.location='index.php';
									</script>";
				}
			mysqli_close($conn); // Closing Connection
		}
}
?>