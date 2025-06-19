<?php
/*
* Database Connection and Contact Form Handling
* This script connects to MySQL database and processes contact form submissions
*/
$conn = mysqli_connect('localhost', 'root', '', 'contact_db') or die('Connection failed');

// Process form submission
if (isset($_POST['send'])) {
    // Sanitize user inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    // Check for duplicate messages
    $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('Query failed');

    if (mysqli_num_rows($select_message) > 0) {
        $message[] = 'Message sent already!';
    } else {
        // Insert new message into database
        mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('Query failed');
        $message[] = 'Message sent successfully!';
        
        // Clear form fields after successful submission
        $_POST = array();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mohammad Nuwahf - Portfolio</title>
    
    <!-- CSS Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>
<body>
    <!-- Message Notification System -->
    <?php 
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '
            <div class="message" id="message" data-aos="zoom-out">
                <span>'.$msg.'</span>
                <i class="fas fa-times" onclick="document.getElementById(\'message\').remove();"></i>
            </div>';
        }
    }
    ?>

    <!-- Header Section -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="#home" class="logo">Portfolio</a>

        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#service">Services</a>
            <a href="#portfolio">Projects</a>
            <a href="#contact">Contact</a>
        </nav>

        <div class="follow">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-github"></a>
        </div>
    </header>

    <!-- Home Section -->
    <section class="home" id="home">
        <div class="image" data-aos="fade-right">
            <img src="images/WhatsApp Image 2025-06-17 at 12.05.19_4095b574.jpg" alt="Mohammad Nuwahf">
        </div>
        <div class="content">
            <h3 data-aos="fade-up">Hi, I am Mohammad Nuwahf</h3>
            <span data-aos="fade-up">Full Stack Developer</span>
            <p data-aos="fade-up">I'm a passionate developer with expertise in both front-end and back-end technologies. I create responsive, user-friendly websites and applications with clean, efficient code.</p>
            <a href="#about" class="btn" data-aos="fade-up">About Me</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <h1 class="heading" data-aos="fade-up"><span>biography</span></h1>

        <div class="biography">
            <p data-aos="fade-up">I'm a Full Stack Developer with 2+ years of experience in web development. I specialize in creating dynamic, responsive websites and web applications using modern technologies. My goal is to deliver high-quality solutions that meet client requirements while maintaining clean, efficient code.</p>

            <div class="bio">
                <h3 data-aos="zoom-in"><span>name : </span> Mohammad Nuwahf</h3>
                <h3 data-aos="zoom-in"><span>email : </span> mohemmadnuwahf123@example.com</h3>
                <h3 data-aos="zoom-in"><span>address : </span> Kalmunai, Sri Lanka</h3>
                <h3 data-aos="zoom-in"><span>phone : </span> +9471234567</h3>
                <h3 data-aos="zoom-in"><span>age : </span> 22 years</h3>
                <h3 data-aos="zoom-in"><span>experience : </span> 2+ years</h3>
            </div>
            <a href="#" class="btn" data-aos="fade-up">Download CV</a>
        </div>

        <div class="skills" data-aos="fade-up">
            <h1 class="heading"><span>Skills</span></h1>

            <div class="progress">
                <div class="bar" data-aos="fade-left"><span>HTML</span> <span>95%</span></div>
            </div>
            <div class="progress">
                <div class="bar" data-aos="fade-right"><span>CSS</span> <span>90%</span></div>
            </div>
            <div class="progress">
                <div class="bar" data-aos="fade-left"><span>JavaScript</span> <span>85%</span></div>
            </div>
            <div class="progress">
                <div class="bar" data-aos="fade-right"><span>PHP</span> <span>80%</span></div>
            </div>
            <div class="progress">
                <div class="bar" data-aos="fade-left"><span>MySQL</span> <span>85%</span></div>
            </div>
            <div class="progress">
                <div class="bar" data-aos="fade-right"><span>React</span> <span>75%</span></div>
            </div>
            <div class="progress">
                <div class="bar" data-aos="fade-left"><span>Java</span> <span>50%</span></div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="service" id="service">
        <h1 class="heading" data-aos="fade-right"><span>services</span></h1>

        <div class="services-container">
            <div class="service-box" data-aos="fade-right">
                <i class="fas fa-code"></i>
                <h3>Web Development</h3>
                <p>Custom website development using modern technologies to create responsive, user-friendly experiences.</p>
            </div>
            <div class="service-box" data-aos="fade-right">
                <i class="fas fa-mobile-alt"></i>
                <h3>Responsive Design</h3>
                <p>Websites that look great and function perfectly on all devices from desktop to mobile.</p>
            </div>
            <div class="service-box" data-aos="fade-right">
                <i class="fas fa-database"></i>
                <h3>Database Design</h3>
                <p>Efficient database architecture and implementation for optimal performance.</p>
            </div>
            <div class="service-box" data-aos="fade-left">
                <i class="fas fa-bug"></i>
                <h3>Debugging</h3>
                <p>Identifying and fixing issues in existing code to improve functionality.</p>
            </div>
            <div class="service-box" data-aos="fade-left">
                <i class="fas fa-paint-brush"></i>
                <h3>UI/UX Design</h3>
                <p>Creating intuitive user interfaces with excellent user experience principles.</p>
            </div>
            <div class="service-box" data-aos="fade-left">
                <i class="fas fa-server"></i>
                <h3>Backend Development</h3>
                <p>Building robust server-side applications and APIs for your web projects.</p>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="portfolio" id="portfolio">
        <h1 class="heading" data-aos="fade-up"><span>My Projects</span></h1>
        
        <div class="projects-intro" data-aos="fade-up">
            <p>Here are some of my recent projects. Each one was built to solve specific problems and deliver exceptional user experiences.</p>
        </div>

        <div class="project" data-aos="zoom-in">
            <h3>Room Booking Management System</h3>
            <p>Developing a Room Booking Management System to simplify the reservation process for hotels or guesthouses. The system allows users to view available rooms, book rooms, manage bookings, and handle payments. Admins can add, update, or delete rooms, manage availability, and view booking history — ensuring smooth, paperless, and efficient room management.</p>
            
            <div class="tech-stack">
                <span class="tech-item">HTML</span>
                <span class="tech-item">CSS</span>
                <span class="tech-item">PHP</span>
                <span class="tech-item">MY SQL</span>
            </div>
            
            <div class="project-links">
                <a href="#" class="project-link">Live Demo</a>
                <a href="#" class="project-link">Code</a>
            </div>
        </div>

        <div class="project" data-aos="zoom-in">
            <h3>My Tasks App</h3>
            <p>A sleek and modern To-Do app with live time updates, swipe gestures for task management, and smooth animations, offering a polished, user-friendly experience in both light and dark modes.</p>
            
            <div class="tech-stack">
                <span class="tech-item">HTML</span>
                <span class="tech-item">CSS</span>
                <span class="tech-item">JS</span>
            </div>
            
            <div class="project-links">
                <a href="#" class="project-link">Live Demo</a>
                <a href="#" class="project-link">Code</a>
            </div>
        </div>

        <div class="project" data-aos="zoom-in">
            <h3>Java lybrary Management System</h3>
            <p>Designing a Library Management System using Java to manage book inventory, student records, and borrowing/returning processes. The system allows librarians to add, update, and delete books, register students, and track issued and returned books. The goal is to simplify library operations, reduce manual errors, and maintain accurate records in an organized digital format.</p>
            
            <div class="tech-stack">
                <span class="tech-item">Java</span>
            </div>
            
            <div class="project-links">
                <a href="#" class="project-link">Live Demo</a>
                <a href="#" class="project-link">Code</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <h1 class="heading" data-aos="fade-up"><span>contact me</span></h1>

        <form action="" method="post" id="contactForm" data-aos="zoom-in">
            <div class="input-box">
                <input type="text" data-aos="fade-left" placeholder="Name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                <input type="email" data-aos="fade-right" placeholder="Email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            <div class="input-box">
                <input type="number" data-aos="fade-left" name="number" placeholder="Phone" required value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : ''; ?>">
            </div>
            <textarea placeholder="Your Message" data-aos="fade-left" name="message" cols="30" rows="10" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
            <input type="submit" value="Send Message" data-aos="zoom-in" name="send" class="btn">
        </form>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> <span>Mohammad Nuwahf</span> | All Rights Reserved</p>
    </footer>

    <!-- JavaScript Files -->
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS animation library
        AOS.init({
            duration: 800,
            delay: 400
        });

        // Prevent form resubmission on page refresh
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>