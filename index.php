<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonorSpot - Organ Donation</title>
    <link rel="stylesheet" href="style.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Header (Website Name) -->
    <header>
        <h1><span style="color: white; font-family:tahoma,sans-serif;"><b>DonorSpot</b></span></h1>
    </header>

    <!-- Navigation Bar -->
    <nav>
    <!-- Left Side Links -->
    <ul class="nav-left">
        <li><a href="index.php"><b>Home</b></a></li>
        <li><a href="about.php"><b>About Us</b></a></li>
        <li><a href="contact.php"><b>Contact Us</b></a></li>
		<li><a href="adminlogin.php"><b>Login as Admin</b></a></li>
    </ul>

    <!-- Right Side Dropdown -->
    <ul class="nav-right">
        <li>
            <button class="dropdown-btn"><b>More ▼</b></button>
            <div class="dropdown-content">
                <a href="signup.php">Sign Up</a>
                <a href="login.php">Login</a>
            </div>
        </li>
    </ul>
</nav>

    <!-- Overview Section -->
    <section class="overview">
       <h1 style="font-size: 40px;"><b>Welcome to <span style="color: red;">DonorSpot</b></span></h1>

        <h2 style="color: green; font-size:30px;"><b>'Organ Donation Is A Blessing That Stays Long After You Have Passed Away'</b></h2>
         <!-- Image Slider -->
    
         <div class="slider-container">
        <div class="slide"><img src="https://www.careinsurance.com/upload_master/media/posts/July2023/organ-transplant.webp" alt="Image 1"></div>
        <div class="slide"><img src="https://madhubankidneycare.com/wp-content/uploads/2023/08/organ-donation-for-Kidney-Transplant.jpg" alt="Image 2"></div>
        <div class="slide"><img src="https://akm-img-a-in.tosshub.com/indiatoday/images/story/202108/organ-donation-4301527_1920.jpg" alt="Image 3"></div>
    </div>

    <script>
        let slides = document.querySelectorAll(".slide");
        let index = 0;

        function showNextSlide() {
            slides[index].style.opacity = "0";
            index = (index + 1) % slides.length;
            slides[index].style.opacity = "1";
        }

        setInterval(showNextSlide, 4000); // Change image every 4 seconds
    </script>

		<br>
		<h1 style="font-size: 35px; color: blue;"> <b>More Donors, More Hope</b></h1>
		<p style="font-size: 25px; color: green; "><b>Every registered organ donor offers hope to people who need transplants - and to the families who love them.</b></p>
        <a href="signup.php" class="btn btn-secondary">Sign Up Now</a>
    </section>
	<section class="overview">
    <div class="container">
        <h2><span style="color: red;font-size: 32px;"><b>DonorSpot</span> – An Initiative for Organ Donation</b></h2>
        <p style="font-size: 25px;" class="intro-text">
            Every year, millions of people lose their lives due to the lack of available organs for transplant. 
            <strong>DonorSpot</strong> is an initiative aimed at bridging the gap between organ donors and recipients. 
            Our mission is to create awareness, simplify the donation process, and save lives through a seamless and 
            transparent system.
        </p>
<img src="https://www.kauveryhospital.com/wp-content/uploads/2024/07/national-organ-donation-day-tamil-nadu-leading-the-way-in-india.jpg" alt="Organ Donation" width="800" height="400"><br>
		<br>
        <div class="content-box">
            <h2 style="color:red;">Why Organ Donation Matters?</h2>
            <p style="font-size: 25px;">Organ donation is a life-saving act that gives people suffering from organ failure a second chance at life. Every year, thousands of patients wait for an organ transplant, but due to a shortage of donors, many lose their lives. Here’s why organ donation is so important:

</p>
<div class="container text-center mt-5">
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://cdn2.iconfinder.com/data/icons/flat-style-svg-icons-part-2/512/add_user_group-512.png" class="card-img-top" alt="Organ Donation">
                    <div class="card-body">
                        <h5 class="card-title"><b>Saves Multiple Lives</b></h5>
                        <p class="card-text">One organ donor can save up to 8 lives by donating the heart, lungs, liver, kidneys, pancreas, and intestines. Additionally, tissue donation (like corneas, skin, and bones) can improve the lives of up to 75 people.</p>
                    </div>
                </div>
            </div>
           
			<div class="col-md-4">
                <div class="card">
                    <img src="https://www.freeiconspng.com/thumbs/family-icon/family-icon-1.png" class="card-img-top" alt="Transplantation">
                    <div class="card-body">
                        <h5 class="card-title"><b>Gives Hope to Patients & Families</b></h5>
                        <p class="card-text">For those suffering from organ failure, a transplant is often their only chance for survival. Organ donation gives them hope for a longer, healthier life.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://cdn-icons-png.freepik.com/512/3718/3718937.png" class="card-img-top" alt="Who Can Pledge">
                    <div class="card-body">
                        <h5 class="card-title"><b> A Gift That Lives On</b></h5>
                        <p class="card-text">By donating your organs, you create a lasting impact. Even after life, you continue to help others by giving them a chance to live. Your decision to donate can create a lasting impact and bringing hope.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br>
<h3 style="color:blue;"><b>Take Action – Become a Donor Today!</b></h3>
<p style="font-size: 20px; color:green;"><b>
If you want to make a difference, register as an organ donor and spread awareness about this noble cause. A small decision today can save many lives tomorrow.
</b></p>
	   </div>

        <div class="content-box">
            <h2 style="color:red;">How DonorSpot Works?</h2>
            <ul>
                <li><strong>Register as a Donor:</strong> Sign up and pledge to donate your organs.</li>
                <li><strong>Find a Donor:</strong> Patients can search for compatible donors.</li>
                <li><strong>Schedule an Appointment:</strong> Book consultations with medical professionals.</li>
                <li><strong>Verified & Secure:</strong> Ensuring safe and ethical organ donation.</li>
            </ul>
        </div>

        <div class="content-box">
            <h2 style="color:red;">Who Can Donate?</h2>
            <p style="font-size: 25px;">Anyone who meets the basic health criteria and is willing to help save lives can become an organ donor. Generally, donors can be:
</p>
<p><b>Living Donors</b> – Healthy individuals who donate a kidney, a portion of their liver, or other tissues.</p>
<p><b>Deceased Donors</b> – People who donate their organs after death.</p>
<p><b>Age & Health Factors</b> – Most people, regardless of age, can donate as long as their organs are healthy.</p>
<p><b>No Discrimination</b> – Donation eligibility is based on medical conditions, not gender, race, or social background.</p>
<br>
        </div>

          <div class="cta-buttons">
            <a  href="signup.php" class="btn btn-secondary">Register as a Donor</a>
            <a  href="about.php" class="btn btn-secondary">Learn More</a>
        </div>
    </div>

    </section>

    <!-- Footer -->
   <footer>
    <p>&copy; 2025 DonorSpot | All Rights Reserved</p>
    <p>Saving Lives, One Donation at a Time.</p>
    
    <ul class="footer-links">
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>

    <p>Contact Us: <a href="mailto:donorspot@gmail.com">donorspot@gmail.com</a> | Phone: <a href="tel:9501114975">9501114975</a></p>
</footer>

</body>
</html>
