<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:/scripts/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="/styles/product.css">
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
            <a href="#">
                <h1>Types of Electronics</h1>
            </a>
            <ul>
                <a href="#section5">All Category</a>
                <a href="#section1">Smartphone</a>
                <a href="#section2">Tablet</a>
                <a href="#section3">Desktop</a>
                <a href="#section4">Laptop</a>
                <a href="/scripts/logout.php" class="logout">Logout</a>
            </ul>
        </div>
    </header>
    <div class="background">
        <div class="container">
            <div class="centered-div">
                <h1 class="hello">welcome <span class="auto-type"></span></h1>
                <a href="#section5"><button>see stock</button></a>
            </div>
        </div>
    </div>
    <section id="section5">
        <div class="background">
            <div class="container" data-aos="fade-up">
                <h1>Result</h1>
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "inventory_system");
                        $sql = "SELECT id, Product, Electronic_code, TypesOfElectronic, Unit_price, Quantity_stock, Stock_value, Stock_status FROM tbl_inventories ORDER BY Stock_value DESC;";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Electronic Code</th>
                                    <th>Types of Electronic</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Stock Value</th>
                                    <th>Stock Status</th>
                                </tr>";
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["Product"] . "</td>
                                    <td>" . $row["Electronic_code"] . "</td>
                                    <td>" . $row["TypesOfElectronic"] . "</td>
                                    <td>" . $row["Unit_price"] . "</td>
                                    <td>" . $row["Quantity_stock"] . "</td>
                                    <td>" . $row["Stock_value"] . "</td>
                                    <td>" . $row["Stock_status"] . "</td>
                                </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No result";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section1">
        <div class="background">
            <div class="container" data-aos="fade-up">
                <h1>Smartphone</h1>
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "inventory_system");
                        $sql = "SELECT Product, Unit_price, Stock_status FROM tbl_inventories WHERE Electronic_code = '1'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Stock Status</th>
                                </tr>";
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                    <td>" . $row["Product"] . "</td>
                                    <td>" . $row["Unit_price"] . "</td>
                                    <td>" . $row["Stock_status"] . "</td>
                                </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No results";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="section2">
        <div class="background">
            <div class="container" data-aos="fade-up">
                <h1>Tablet</h1>
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "inventory_system");
                        $sql = "SELECT Product, Unit_price, Stock_status FROM tbl_inventories WHERE Electronic_code = '2'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Stock Status</th>
                                </tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["Product"] . "</td>
                                        <td>" . $row["Unit_price"] . "</td>
                                        <td>" . $row["Stock_status"] . "</td>
                                    </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No results";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section3">
        <div class="background">
            <div class="container" data-aos="fade-up">
                <h1>Desktop</h1>
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "inventory_system");
                        $sql = "SELECT Product, Unit_price, Stock_status FROM tbl_inventories WHERE Electronic_code = '3'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Stock Status</th>
                                </tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["Product"] . "</td>
                                        <td>" . $row["Unit_price"] . "</td>
                                        <td>" . $row["Stock_status"] . "</td>
                                    </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No results";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section4">
        <div class="background">
            <div class="container" data-aos="fade-up">
                <h1>Laptop</h1>
                <div class="scroll-bg">
                    <div class="scroll-div">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "inventory_system");
                        $sql = "SELECT Product, Unit_price, Stock_status FROM tbl_inventories WHERE Electronic_code = '4'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Stock Status</th>
                                </tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["Product"] . "</td>
                                        <td>" . $row["Unit_price"] . "</td>
                                        <td>" . $row["Stock_status"] . "</td>
                                    </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No results";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1500,
            delay: 100,
            offset: 120,
            mirror: true,
            once: false
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var userName = "<?php echo $_SESSION['user_name']; ?>";

        var typed = new Typed(".auto-type", {
            strings: [userName],
            typeSpeed: 150,
            backSpeed: 150,
            loop: false
        });
    </script>
    <script>
        window.onbeforeunload = function() {
            window.scrollTo(0, 0);
        };
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
</body>
</html>