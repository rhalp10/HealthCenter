<?php
include('login_action.php'); // Includes Login Script
if(isset($_SESSION['login_user']))
{           
            $user=$_SESSION['login_user'];// passing the session user to new user variable
            
            $query = mysqli_query($conn,"SELECT * FROM user_account WHERE username='$user'"); //SQL query to fetch information of registerd users and finds user match.
            $rows = mysqli_fetch_assoc($query);
                if ($rows['level_ID'] == '1') //checking if acclevel is equal to 0
                {   
                    header("location: admin/index.php");// retain to admin level 
                }
                elseif ($rows['level_ID'] == '2')  //checking if acclevel is equal to 1
                {
                   
                    header("location: admin/index.php"); // retain to student Level
                    
                } 
                elseif ($rows['level_ID'] == '3')  //checking if acclevel is equal to 2
                {
                     header("location: admin/index.php"); // retain to teacher Level
                }
                else
                {

                }
    
            
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Index</title>

    <!-- Bootstrap -->
    <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="modal-body" role="form" method="post" id="login-form">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <!-- <input type="submit" class="btn btn-default submit"  name="submit" value="Log in"> -->
                <button type="submit" class="btn bg-primary-400 btn-block" name="submit">Login <i class="icon-arrow-right14 position-right"></i></button>
               <!--  <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <!-- <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div> -->
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>



