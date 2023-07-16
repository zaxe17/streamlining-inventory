<?php
$error = array();

if (isset($_POST['update'])) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "inventory_system";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $Product = $_POST['Product'];
    $Reorder_status = $_POST['Reorder_status'];

    $query = "UPDATE `tbl_inventories` SET `Reorder_status`='$Reorder_status'  WHERE `Product`='$Product'";

    if (mysqli_query($connect, $query)) {
        $error[] = 'Reorder Status updated successfully.';
    } else {
        $error[] = 'Error updating data: ' . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streamlining Supply Reorder Update</title>
    <link rel="stylesheet" href="../styles/update.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="/assets/SLS_LOGO-removebg-preview.png" alt="">
        </div>
    </header>
    <div class="background">
        <div class="container">
            <form action="/pages/reorder_status_update.php" method="POST">
                <h1>Reorder Status</h1>
                <input type="text" name="Product" placeholder="Enter Product name" required>
                <select name="Reorder_status" required>
                    <option selected disabled>Set Reorder Status</option>
                    <option value="TO RECEIVE">TO RECEIVE</option>
                    <option value="TO SHIP">TO SHIP</option>
                    <option value="NO ORDER">NO ORDER</option>
                </select>
                <?php
                if (!empty($error)) {
                    foreach ($error as $errorMsg) {
                        echo '<span class="error-msg">' . $errorMsg . '</span>';
                    };
                };
                ?>
                <input class="button" type="submit" name="update" value="Set Reorder Status">
            </form>
            <form action="/pages/result.php">
                <input class="button" type="submit" value="Result">
            </form>
        </div>
    </div>
</body>
</html>
