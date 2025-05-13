<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - DonorSpot</title>
	<style>
	* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
	
}
.about{
	background-image: url('https://medicahospitals.in/wp-content/uploads/2024/04/mobile-banner-1.webp');
	background-size:cover;
	background-repeat:no-repeat;
	background-position:center;
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
    background-color: #2f4f4f;;
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
        <li><a href="contact.php"><b>Contact Us</b></a></li>
    </ul>
    </nav>

    <!-- About Section -->
    <section class="about">
	<p style="font-size:25px;"><strong style="color:red;font-size:30px;""><b>DonorSpot</b></strong><b> is a platform dedicated to connecting organ donors with recipients in need. Our mission is to spread awareness about organ donation and make the process easier for both donors and patients.</b></p>
<br>
        <h1><b> Who we are :</b></h1>
		<p style="font-size:25px;">We are a dedicated platform committed to spreading awareness about organ donation and encouraging people to make a life-saving difference. Our mission is to educate, inspire, and facilitate individuals in becoming organ donors, ultimately helping those in need of transplants. We believe that organ donation is one of the most selfless acts a person can do, as it has the power to give someone a second chance at life.
</p><br>
<h1><b>What is Organ Donation?</b></h1>
<p style="font-size:25px;">Organ donation is the process of donating organs or tissues to someone in need. This can be done in two ways:</p><br>

<p style="font-size:25px;">1. Living Donation – A healthy person donates an organ or part of an organ (such as a kidney or a portion of the liver) to someone who needs it.
</p><br>

<p style="font-size:25px;">2. Deceased Donation – After a person’s death, their healthy organs (such as the heart, lungs, liver, kidneys, pancreas, and corneas) can be donated to save or improve the lives of multiple patients.
</p><br>
<p style="font-size:25px;">Organ transplantation has transformed modern medicine, giving thousands of people a second chance at life every year. However, the demand for organs is much higher than the available supply, which is why raising awareness is crucial.
</p><br>
      <h1><b>  Why Organ Donation Matters</b></h1>

<p style="font-size:25px;">Every year, millions of people suffer from organ failure, and many of them lose their lives while waiting for a donor. By choosing to donate, you can:
</p><br>
<p style="font-size:25px;">Save up to 8 lives with organ donation.
</p><br>
<p style="font-size:25px;">Improve the quality of life for people in need of tissue and cornea transplants.
</p><br>
<p style="font-size:25px;">Leave a lasting legacy of kindness and compassion.
</p><br>

 <h1><b> What We Do :</b></h1>

<p style="font-size:25px;">Our platform is dedicated to:
</p><br>
<p style="font-size:25px;">Educating people about the importance of organ donation through articles, facts, and real-life stories.
</p><br>
<p style="font-size:25px;">Providing an easy way to register as an organ donor, making the process simple and accessible for everyone.
</p><br>
<p style="font-size:25px;">Connecting individuals with hospitals and non-profit organizations that facilitate organ transplants.
</p><br>
<p style="font-size:25px;">Dispelling myths and misconceptions about organ donation to ensure people make informed decisions.
</p><br>

        <h2 style="color:black;"><b>Our Mission :</b></h2>
        <p style="font-size:25px;color:yellow;">We aim to save lives by encouraging organ donation and simplifying the registration process. Every donor has the power to give someone a second chance at life.</p>
<br>
        <h2 style="color:black;">How It Works?</h2>
        <ul style="font-size:25px;color:yellow;">
            <li>Donors can register on our platform and express their willingness to donate.</li>
            <li>Hospitals and patients in need can search for compatible donors.</li>
            <li>We provide information and resources to make organ donation seamless and transparent.</li>
        </ul>
		<br>
		<h1 style="color:blue;text-align:center;font-size: 30px;"><b>Take Action – Become a Donor Today!</b></h1>
<p style="font-size: 25px; color:red;text-align:center;"><b>
If you want to make a difference, register as an organ donor and spread awareness about this noble cause. A small decision today can save many lives tomorrow.
</b></p>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 DonorSpot | All Rights Reserved</p>
    </footer>

</body>
</html>


