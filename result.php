<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:/scripts/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streamlining Supply Result</title>
    <link rel="stylesheet" href="/styles/result.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="window.js"></script>
</head>
<body>
    <header>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <h1>Types of Electronics</h1>
            <ul>
                <a href="#">Home</a>
                <a href="/pages/insert.php">Add</a>
                <a href="/pages/update.php">Update</a>
                <a href="/pages/delete.php">Delete</a>
                <a href="/pages/reorder_status_update.php">Set Reorder Status</a>
                <a href="/scripts/logout.php" class="logout">Logout</a>
            </ul>
        </div>
    </header>
    <div class="background">
        <div class="container">
            <div class="centered-div">
                <h1 class="hello">HELLO <span class="auto-type"></span></h1>
                <a href="#section1"><button>see data</button></a>
            </div>
        </div>
    </div>
    <section id="section1">
        <div class="background">
            <div class="container" data-aos="fade-up">
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "inventory_system");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $updateSql = "UPDATE tbl_inventories SET TypesOfElectronic = 
                            IF(Electronic_code = 1, 'Smartphone', 
                            IF(Electronic_code = 2, 'Tablet', 
                            IF(Electronic_code = 3, 'Desktop', 
                            IF(Electronic_code = 4, 'Laptop', 'NOT AVAILABLE'))))";
                        mysqli_query($conn, $updateSql);

                        $updateSql = "UPDATE tbl_inventories SET Stock_value = (Unit_price * Quantity_stock)";
                        mysqli_query($conn, $updateSql);

                        $updateSql = "UPDATE tbl_inventories SET Stock_status = 
                            IF(Quantity_stock = 0, 'OUT OF STOCK', 
                            IF(Quantity_stock <= Reorder_point, 'LOW STOCK', 'IN STOCK'))";
                        mysqli_query($conn, $updateSql);

                        $updateSql = "UPDATE tbl_inventories SET Reorder_point = 
                            ((Average_reorder_time_in_days * Average_daily_sales) + Safety_stock)";
                        mysqli_query($conn, $updateSql);

                        $updateSql = "UPDATE tbl_inventories SET Safety_stock = 
                            (((Average_reorder_time_in_days + 3) * (Average_daily_sales + 3)) - 
                            (Average_reorder_time_in_days * Average_daily_sales))";
                        mysqli_query($conn, $updateSql);

                        $updateSql = "UPDATE tbl_inventories SET Company_name =
                            CASE Company_id
                                WHEN 'C01-0234' THEN 'Apple Computer, Inc.'
                                WHEN 'C02-2142' THEN 'BBK Electronics'
                                WHEN 'C03-2241' THEN 'Samsung Electronics Co., Ltd.'
                                WHEN 'C04-0405' THEN 'Xiaomi Corporation'
                                WHEN 'C05-5234' THEN 'Lenovo Group Limited'
                                WHEN 'C06-1145' THEN 'Hewlett-Packard Company'
                                WHEN 'C07-2332' THEN 'Dell Computer Corporation'
                                WHEN 'C08-5256' THEN 'Vanguard Group, Inc.'
                                WHEN 'C09-2745' THEN 'Micro-Star Internation Co., Ltd.'
                                ELSE 'ASUS'
                            END";
                        mysqli_query($conn, $updateSql);

                        $sql = "SELECT Company_id, Company_name, id, Product, Electronic_code, TypesOfElectronic, Unit_price, Quantity_stock, Stock_value, Stock_status, Reorder_status, Average_reorder_time_in_days, Average_daily_sales, Reorder_point, Safety_stock FROM tbl_inventories";
                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            echo "<table>
                                    <tr>
                                        <th>Company ID</th>
                                        <th>Company Name</th>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Electronic Code</th>
                                        <th>Types of Electronic</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Stock Value</th>
                                        <th>Stock Status</th>
                                        <th>Reorder Status</th>
                                        <th>Average Reorder Time in Days</th>
                                        <th>Average Daily Sales</th>
                                        <th>Reorder Point</th>
                                        <th>Safety Stock</th>
                                    </tr>";

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>" . $row["Company_id"] . "</td>
                                        <td>" . $row["Company_name"] . "</td>
                                        <td>" . $row["id"] . "</td>
                                        <td>" . $row["Product"] . "</td>
                                        <td>" . $row["Electronic_code"] . "</td>
                                        <td>" . $row["TypesOfElectronic"] . "</td>
                                        <td>" . $row["Unit_price"] . "</td>
                                        <td>" . $row["Quantity_stock"] . "</td>
                                        <td>" . $row["Stock_value"] . "</td>
                                        <td>" . $row["Stock_status"] . "</td>
                                        <td>" . $row["Reorder_status"] . "</td>
                                        <td>" . $row["Average_reorder_time_in_days"] . "</td>
                                        <td>" . $row["Average_daily_sales"] . "</td>
                                        <td>" . $row["Reorder_point"] . "</td>
                                        <td>" . $row["Safety_stock"] . "</td>
                                    </tr>";
                            }

                            echo "</table>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var adminName = "<?php echo $_SESSION['admin_name']; ?>";

        var typed = new Typed(".auto-type", {
            strings: [adminName],
            typeSpeed: 150,
            backSpeed: 150,
            loop: false
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
    <script>
        const sidebar = document.querySelector('.sidebar');
        const checkbox = document.getElementById('check');

        document.addEventListener('click', function(event) {
            if (!sidebar.contains(event.target) && event.target !== checkbox) {
                checkbox.checked = false;
            }
        });
    </script>
    <script>
        window.onbeforeunload = function() {
            window.scrollTo(0, 0);
        };
    </script>
</body>
</html>