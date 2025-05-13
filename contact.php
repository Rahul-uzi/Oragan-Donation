
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - DonorSpot</title>
    <style>
	* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
	
}

	/* Header */
header {
    text-align: center;
    padding: 15px;
    background:red;
    font-size: 24px;
    font-weight: bold;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
	nav {
    background-color:#2f4f4f;;
    padding: 15px;
    text-align: left;
}

/* Left Side Navigation */
.nav-left {
    display: flex;
    list-style: none;
}

.nav-left li {
    margin-right: 25px;
}

/* Navigation Links */
.nav-left li a {
    text-decoration: none;
    color: white;
    font-size: 18px;
    padding: 10px 2px;
    transition: all 0.3s ease-in-out;
    position: relative;
}

/* Hover Effect with Background */
.nav-left li a:hover {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 8px;
}

/* Underline Animation */
.nav-left li a::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -4px;
    width: 100%;
    height: 3px;
    background-color: white;
    transform: scaleX(0);
    transition: transform 0.3s ease-in-out;
}

.nav-left li a:hover::after {
    transform: scaleX(1);
}

/* Active Link */
.nav-left li a.active {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 8px;
}
/* Footer */
footer {
    text-align: center;
    background: #222;
    color: white;
    padding: 15px 0;
    margin-top: 20px;
}
.contact{
	background-image: url('https://medicahospitals.in/wp-content/uploads/2024/04/mobile-banner-1.webp');
	background-size:cover;
	background-repeat:no-repeat;
	background-position:center;
}
</style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1><span style="color: white;">DonorSpot</span></h1>
    </header>

    <!-- Navigation Bar -->
    <nav>
    <!-- Left Side Links -->
    <ul class="nav-left">
        <li><a href="index.php"><b>Home</b></a></li>
        <li><a href="about.php"><b>About Us</b></a></li>
    </ul>
    </nav>

    <!-- Contact Details -->
    <section class="contact">
	<br>
        <h2 style="text-align:center; font-size:40px; color:blue;"><b>📞Contact Us </b></h2>
        <p style="text-align:center; font-size:30px; color:white;"><b>Feel free to reach out to us through the following contact details.</b></p>
        
       <pre style="font-size:25px;"> <b>📞 Contact Us – Get in Touch!</b>
</pre><br>
  <p style="font-size:25px;">We are here to answer your questions about organ donation, registration, and support. Whether you want to become a donor, need help for a transplant, or have any queries, feel free to reach out!
</p>
<br><pre style="font-size:25px;"><b>
 📍 Our Office

  DonorSpot
  123, XYZ Street, City, State, ZIP Code

 📧 Email Us

  📩 donorspot@gmail.com

 ☎ Call Us

  📞 +91 9501114975

 💬 WhatsApp Support

  📲 +91 7973615997

 🕒 Working Hours

  🕙 Monday - Friday: 9 AM - 6 PM
  🕘 Saturday: 10 AM - 4 PM
  🚫 Sunday: Closed
</b></pre>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 DonorSpot | All Rights Reserved</p>
    </footer>

</body>
</html>

