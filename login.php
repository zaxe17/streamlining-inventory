<?php
@include 'config.php';
session_start();

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM login_form WHERE name = '$name' AND password = '$pass'";
   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {

         $_SESSION['admin_name'] = $row['name'];
         header('location:/pages/result.php');
      } elseif ($row['user_type'] == 'user') {

         $_SESSION['user_name'] = $row['name'];
         header('location:/pages/product.php');
      }
   } else {
      $error[] = 'incorrect email or password!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="/styles/login_register.css">
</head>
<body>
   <div class="logo">
      <img src="/assets/SLS_LOGO-removebg-preview.png" alt="">
   </div>
   <div class="background">
      <div class="login">

         <form action="" method="post">
            <h1>Login</h1>
            <?php
            if (isset($error)) {
               foreach ($error as $error) {
                  echo '<span class="error-msg">' . $error . '</span>';
               };
            };
            ?>
            <input type="name" name="name" required placeholder="Enter your name">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Login" class="button">
         </form>
         <p>Don't have an account? <a href="/scripts/register.php">Register now</a></p>
      </div>
   </div>
</body>
</html>