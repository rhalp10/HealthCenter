<?php
require_once('dbconfig.php');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn,"SELECT * FROM `user_account` ua
INNER JOIN user_detail ud ON ua.user_ID =ud.user_ID WHERE ua.username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
$img_session =$row['detail_img'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>