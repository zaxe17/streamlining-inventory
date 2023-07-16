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

    $Company_id = $_POST['Company_id'];
    $Product = $_POST['Product'];
    $Electronic_code = $_POST['Electronic_code'];
    $Unit_price = $_POST['Unit_price'];
    $Quantity_stock = $_POST['Quantity_stock'];
    $Average_reorder_time_in_days = $_POST['Average_reorder_time_in_days'];
    $Average_daily_sales = $_POST['Average_daily_sales'];

    $Product = mysqli_real_escape_string($connect, $Product);

    $checkQuery = "SELECT * FROM `tbl_inventories` WHERE Product = '$Product'";
    $checkResult = mysqli_query($connect, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $error[] = 'Product already exists!';
    } else {
        $randomNumber = mt_rand(10000000, 99999999);
        $id = "PD" . $randomNumber;

        $query = "INSERT INTO `tbl_inventories` (Company_id, id, Product, Electronic_code, Unit_price, Quantity_stock, Average_reorder_time_in_days, Average_daily_sales) VALUES ('$Company_id', '$id', '$Product', '$Electronic_code', '$Unit_price', '$Quantity_stock', '$Average_reorder_time_in_days', '$Average_daily_sales')";

        if (mysqli_query($connect, $query)) {
            $error[] = 'New data has been inserted successfully.';
        } else {
            $error[] = 'Error inserting data: ' . mysqli_error($connect);
        }
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
    <title>Streamlining Supply Insert</title>
    <link rel="stylesheet" href="../styles/insert.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="/assets/SLS_LOGO-removebg-preview.png" alt="">
        </div>
    </header>
    <div class="background">
        <div class="container">
            <form action="/pages/insert.php" method="POST">
                <h1>Insert Inventory</h1>
                <select name="Company_id" id="" required>
                    <option selected disabled>Select Company Name</option>
                    <option value="C01-0234">Apple Computer, Inc.</option>
                    <option value="C02-2142">BBK Electronics</option>
                    <option value="C03-2241">Samsung Electronics Co., Ltd.</option>
                    <option value="C04-0405">Xiaomi Corporation</option>
                    <option value="C05-5234">Lenovo Group Limited</option>
                    <option value="C06-1145">Hewlett-Packard Company</option>
                    <option value="C07-2332">Dell Computer Corporation</option>
                    <option value="C08-5256">Vanguard Group, Inc.</option>
                    <option value="C09-2745">Micro-Star Internation Co., Ltd.</option>
                    <option value="C10-5467">ASUS</option>
                </select>
                <input type="text" name="Product" placeholder="Product name" required>
                <select name="Electronic_code" id="" required>
                    <option selected disabled>Electronic Code</option>
                    <option value="1">Smartphone</option>
                    <option value="2">Tablet</option>
                    <option value="3">Desktop</option>
                    <option value="4">Laptop</option>
                </select>
                <input type="text" name="Unit_price" placeholder="Unit Price" required>
                <input type="text" name="Quantity_stock" placeholder="Quanitity" required>
                <input type="text" name="Average_reorder_time_in_days" placeholder="Average Reorder Time in Days" required>
                <input type="text" name="Average_daily_sales" placeholder="Average Daily Sales" required>
                <input class="button" type="submit" name="update" value="new data">
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    };
                };
                ?>
            </form>
            <form action="/pages/result.php">
                <input class="button" type="submit" value="Result">
            </form>
        </div>
    </div>
</body>
</html>