<?php
session_start(); // Starting Session
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
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			require_once('dbconfig.php');
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($connection,$username);
			$password = mysqli_real_escape_string($connection,$password);
			

			
			// Selecting Database
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query( $connection,"SELECT count(user_ID) rowCount FROM user_account WHERE password = '$password' AND username='$username'");
			$rows = mysqli_fetch_assoc($query);


				if ($rows[0] = 1) //checking if acclevel is equal to 0
                {   
                    
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: dashboard.php"); // retain to user dashboard
                }
				else 
				{
					echo "<script>alert('Access Denied!	');
										window.location='index.php';
									</script>";
				}
			mysqli_close($connection); // Closing Connection
		}
}
?>