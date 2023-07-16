<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streamlining Supply</title>
    <link rel="stylesheet" href="../styles/frontPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Source+Code+Pro:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/535a9c8dda.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <header>
        <div class="logo">
            <img src="/assets/SLS_LOGO-removebg-preview.png" alt="">
        </div>
        <nav class="nav-bar">
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#section1">About</a>
                </li>
                <li>
                    <a href="#footer">Contact</a>
                </li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="background">
            <div class="login">
                <h1 class="inventory">Streamlining</h1>
                <h1>Supply</h1>
                <a href="/scripts/login.php">
                    <button>Get Started</button>
                </a>
            </div>
        </div>
    </section>
    <section id="section1">
        <div class="inner-section" data-aos="fade-right" data-aos-easing="ease-in">
            <h1>About Us</h1>
            <p class="text">
                Streamlining Supply is your go-to solution for efficient inventory management. We are dedicated to revolutionizing inventory control through real-time tracking and automation. Our comprehensive system streamlines stock replenishment, order processing, and enhances customer service.
                You can enjoy the advantages of better inventory management with the help of our cutting-edge solution. We do away with the drawbacks of manual processes, such errors, stockouts, and delays. Our system provides accurate and up-to-date information, ensuring you always have the right products in stock.
                We put the needs of our customers first. Your inventory management system is always supported and ensuring it remains secure and up-to-date. Our team offers training, and assistance to help you make the most of our system.
                Join Streamlining Supply and experience the benefits of efficient inventory management. Transform your business and take it to new heights of success.
            </p>
        </div>
    </section>
    <footer id="footer">
        <div class="footerContainer">
        <div class="socialIcons" data-aos="fade-up">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-facebook-messenger"></i></a>
            <a href="tel: 09265424417"><i class="fa-solid fa-phone"></i></a>
            <a href="mailto: streamliningsupply@gmail.com"><i class="fa-sharp fa-solid fa-m"></i></a>
        </div>
        <div class="footNav">
        <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#section1">About</a>
                </li>
            </ul>
        </div>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2023; Designed by <span class="name">ict 12-2 streamlining supply</span></p>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const section = document.getElementById('section1');
            const navBar = document.querySelector('.nav-bar');

            function handleSectionScroll() {
                const rect = section.getBoundingClientRect();

                if (rect.top <= 0) {
                    navBar.classList.add('scrolled');
                } else {
                    navBar.classList.remove('scrolled');
                }
            }

            window.addEventListener('scroll', handleSectionScroll);
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            delay: 100,
            offset: 120,
            once: false
        });
    </script>
</body>
</html>