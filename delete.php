<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "inventory_system";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update'])) {
    $Product = $_POST['Product'];

    $query = "DELETE FROM `tbl_inventories` WHERE `Product`='$Product'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $error[] = 'Data Deleted Successfully.';
    } else {
        echo 'Error deleting data: ' . mysqli_error($connect);
    }
}

$query = "SELECT * FROM `tbl_inventories`";
$result = mysqli_query($connect, $query);

mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streamlining Supply Deleting Data</title>
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
            <form action="/pages/delete.php" method="POST">
                <h1>Delete Inventory</h1>
                <select name="Product" id="">
                    <?php while($row = mysqli_fetch_array($result)): ?>
                        <option value="<?php echo $row['Product']; ?>"><?php echo $row['Product']; ?></option>
                    <?php endwhile; ?>
                </select>
                <?php
                if (isset($error)) {
                    foreach ($error as $errorMsg) {
                        echo '<span class="error-msg">' . $errorMsg . '</span>';
                    }
                }
                ?>
                <input class="button" type="submit" name="update" value="delete data">
            </form>
            <form action="/pages/result.php">
                <input class="button" type="submit" value="Result">
            </form>
        </div>
    </div>
</body>
</html>