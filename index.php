<?php 
session_start();
include 'config.php'; 
error_reporting(E_ALL);

if (isset($_SESSION['username'])) {
  header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
    $email      = mysqli_real_escape_string ($conn, $_POST['email']);
    $password   = mysqli_real_escape_string ($conn, $_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email' AND PASSWORD = '" . sha1($password) . "'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        echo "<script>alert('Login success, Have a nice day'){document.location.href='dashboard.php'};</script>";
        } 
      
    else {
        echo "<script>alert('Wrong Password, Please check your credentials!')</script>";
            
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

    <title>Microchip Class </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="#" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Email" name="email"required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password"" required />
              </div>
              <div>
                <button name="submit" value="submit" class="btn">Login</button>
                <button name="register" class="btn"><a href="register.php">Register</button></a> 
              </div>
                <div>
                  <h1><i class="fa fa-paw"></i> Microchip Class</h1>
                  <p>©2022</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
