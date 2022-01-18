<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION["user_id"])) {
  header("Location: welcome.php");
}

//line 8-41 for signup validation.
if (isset($_POST["signup"])) {
  //line 9-13 storing signup form data in these new variables.
  $school_name = mysqli_real_escape_string($conn, $_POST["signup_school_name"]);
  $school_code = mysqli_real_escape_string($conn, $_POST["signup_school_code"]);
  $email = mysqli_real_escape_string($conn, $_POST["signup_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["signup_password"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["signup_cpassword"]));

  //Checking and storing the value if email already exist in our database.
  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));

  //checking if confirm passord matched or not.
  if ($password !== $cpassword) {
    echo "<script>alert('Password did not match');</script>";
  } elseif ($check_email > 0) {
    echo "<script>alert('Email already exists in the database');</script>";
  } else {
    //insert query for inserting data in the users table.
    $sql = "INSERT INTO `users`(`school_code`, `school_name`, `email`, `password`) VALUES ('$school_code','$school_name','$email','$password')";
    //executing the insert query and storing the result.
    $result = mysqli_query($conn, $sql);
    if ($result) {
      //line 25-29 when reg successful all filed will be cleared in the signup form.
      $_POST["signup_school_name"] = "";
      $_POST["signup_school_code"] = "";
      $_POST["signup_email"] = "";
      $_POST["signup_password"] = "";
      $_POST["signup_cpassword"] = "";
      echo "<script>alert('Registration Successfull.');</script>";
    } else {
      echo "<script>alert('Registration Failed.');</script>";
    }
  }
}

//line 50-66 for signin validation.
if (isset($_POST["signin"])) {
  //storing signin form data in these variables.
  $school_code = mysqli_real_escape_string($conn, $_POST["signin_school_code"]);
  $email = mysqli_real_escape_string($conn, $_POST["signin_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["signin_password"]));

  //Checking and storing the value if login data exist in our database.
  $check_email = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$password' AND school_code='$school_code'");

  if (mysqli_num_rows($check_email) > 0) {
    $row = mysqli_fetch_assoc($check_email);
    $_SESSION["user_id"] = $row['id'];
    header("Location: welcome.php");
  } else {
    echo "<script>alert('Email or Password Incorrect. Please try again.');</script>";
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/login-register.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <!--Sign In Form-->
        <form action="#" class="sign-in-form" method="POST">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="School Code" name="signin_school_code" value="<?php $_POST['signin_school_code']; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Email Address" name="signin_email" value="<?php $_POST['signin_email']; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="signin_password" value="<?php $_POST['signin_password']; ?>" required />
          </div>
          <input type="submit" value="Login" name="signin" class="btn solid" />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>

        <!--Sign Up Form-->
        <form action="#" class="sign-up-form" method="POST">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="School Name" name="signup_school_name" value="<?php echo $_POST["signup_school_name"]; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="School code" name="signup_school_code" value="<?php echo $_POST["signup_school_code"]; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="signup_email" value="<?php echo $_POST["signup_email"]; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="signup_password" value="<?php echo $_POST["signup_password"]; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" name="signup_cpassword" value="<?php echo $_POST["signup_cpassword"]; ?>" required />
          </div>
          <input type="submit" class="btn" name="signup" value="Sign up" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>