<?php
@include 'config.php';

if (isset($_POST['name'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM login_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';
    } else {

        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO login_form (name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location: /scripts/login.php');
        }
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <link rel="stylesheet" href="../styles/login_register.css">

</head>
<body>
    <div class="logo">
        <img src="/assets/SLS_LOGO-removebg-preview.png" alt="">
    </div>
    <div class="background">
        <div class="login">
            <form action="/scripts/register.php" method="post">
                <h1>Register now</h1>
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    };
                };
                ?>
                <input type="text" name="name" placeholder="Enter your name" required>
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="password" name="password" placeholder="Enter your password" required>
                <input type="password" name="cpassword" placeholder="Confirm your password" required>
                <select name="user_type" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="submit" name="submit" value="Register now" class="button">
            </form>
            <p>Already have an account? <a href="/scripts/login.php">Login now</a></p>
        </div>
    </div>
</body>
</html>