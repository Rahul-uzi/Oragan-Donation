<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost"; // Change if needed
$username = "root"; // Change if using a different MySQL user
$password = ""; // Change if MySQL has a password
$database = "donorspot";

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonorSpot Dashboard</title>
   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="userindex.css">
</head>
<body>
<header>
        <h2>Welcome, <?php echo $user['name']; ?>!</h2>
       
    </header>

  <nav>
        <ul>
            
            <li><a href="profile.php">Profile</a></li>
            <li><a href="register.php">Register as Donors</a></li>
            <li><a href="patient.php">Register as Patient</a></li>
            
			
        </ul>
    </nav>


    <!-- Organ Cards Section -->
    <div class="container my-5">
	
	<p style="font-size:25px; color:blue;">Organ donation is a noble act that can save and improve multiple lives. It is broadly classified into two types: Living Donation and Deceased Donation. Each type has its own significance and eligibility criteria.
</p>
<h3>1️⃣ Living Organ Donation</h3>
<br>
<p style="font-size:20px;">Living organ donation occurs when a healthy individual voluntarily donates an organ or a part of an organ to someone in need. This type of donation is common for organs that can regenerate or where one organ can function independently.
</p>
<pre style="font-size:18px;">🔹 Commonly Donated Organs in Living Donation:
✔ Kidney – Since humans have two kidneys, one can be donated without harming the donor.
✔ Liver (Partial Donation) – The liver has the ability to regenerate, so a portion can be donated.
✔ Bone Marrow – Essential for treating blood-related diseases like leukemia.

💡 Who Can Be a Living Donor?
</pre>
<p style="font-size:18px;">Living donors are usually close relatives, friends, or even altruistic donors (someone who donates without a specific recipient in mind).
</p>


<h3>2️⃣ Deceased Organ Donation</h3>
<br>
<p style="font-size:20px;">Deceased organ donation occurs when a person who has passed away donates their organs. This is possible only if the donor has previously registered for organ donation or if the family consents after death.
</p>
<pre style="font-size:18px;">🔹 Commonly Donated Organs in Deceased Donation:
✔ Heart – Cannot be donated while alive, so it comes only from deceased donors.
✔ Lungs – Can be transplanted from a deceased donor.
✔ Kidneys – Even after death, kidneys remain viable for transplantation for a certain time.
✔ Liver – Whole liver can be donated posthumously.
✔ Cornea (Eye) – Restores vision for people with corneal blindness.

💡 Who Can Be a Deceased Donor?

People who suffer brain death (their brain has stopped functioning, but the heart is still beating).

Those who have pledged for organ donation or whose family consents after their death.
</pre>
<br>
        <h1 class="text-center fw-bold text-danger">Organs Available for Donation :</h1>
		<br>
        <div class="row">
            <?php
            $organs = [
                ["name" => "Heart", "image" => "https://img.freepik.com/premium-vector/human-heart-icon-illustration-vector_1076263-138.jpg", "desc" => "Heart donation can save lives of patients with heart failure."],
                ["name" => "Liver", "image" => "https://thumbs.dreamstime.com/b/anatomy-human-liver-organ-digestive-gallbladder-blood-supply-to-liver-vector-illustration-internal-organ-306327289.jpg", "desc" => "A portion of the liver can be donated and it regenerates itself."],
                ["name" => "Kidney", "image" => "https://static.vecteezy.com/system/resources/previews/005/920/692/non_2x/human-kidney-and-its-arteries-isolated-on-white-background-illustration-of-human-kidney-organ-free-vector.jpg", "desc" => "Living kidney donation can give a new life to patients with kidney failure."],
                ["name" => "Lungs", "image" => "https://img.freepik.com/premium-vector/healthy-human-lungs-human-body-part_156779-1197.jpg", "desc" => "Lung transplants can help people with severe lung diseases."],
                ["name" => "Eye", "image" => "https://media.istockphoto.com/id/179209374/photo/a-close-up-of-a-blue-female-human-eye.jpg?s=612x612&w=0&k=20&c=wqKmZy4pGBQxo6QAa-92AZig8IJB7neCxQ8OwmpgdYY=", "desc" => "Eye donation restores vision for those with corneal blindness."]
            ];

            foreach ($organs as $organ) {
                echo "
                <div class='col-lg-4 col-md-6 my-3'>
                    <div class='organ-card'>
                        <div class='img-box'>
                            <img src='{$organ['image']}' alt='{$organ['name']}'>
                        </div>
                        <div class='content'>
                            <h4>{$organ['name']}</h4>
                            <p>{$organ['desc']}</p>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Footer -->
    <footer>
        <p>&copy; 2025 DonorSpot | All Rights Reserved</p>
    </footer>
</body>
</html>

