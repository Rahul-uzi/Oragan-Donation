<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration - DonorSpot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="register.css" rel="stylesheet">
</head>
<body>
<nav class="navbar">
        <a class="navbar-brand" href="#">DonorSpot</a>
        <ul class="navbar-nav">
            <li><a href="userindex.php"><b>Home</b></a></li>
        </ul>
    </nav>

<div class="container">
    <h2 class="text-center text-danger"><b>Donor Registration for Organ Donation</b></h2>
    <form action="register_donor.php" method="POST">
        <div class="mb-3">
            <label class="form-label"><b>Full Name</b></label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Date of Birth</b></label>
            <input type="date" class="form-control" name="dob" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Gender</b></label>
            <select class="form-select" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Blood Group</b></label>
            <select class="form-select" name="blood_group">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Phone Number</b></label>
            <input type="text" class="form-control" name="phone" required>
        </div>
		<div class="mb-3">
            <label class="form-label"><b>Email</b></label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Address</b></label>
            <textarea class="form-control" name="address" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Donation Type</b></label>
            <select class="form-select" name="donation_type">
                <option value="Living Organ">Living Organ</option>
                <option value="Deceased Organ">Deceased Organ</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Organ Type</b></label>
            <select class="form-select" name="organ_type" id="organType" onchange="toggleSpecificOrgan()">
                <option value="All Organs">All Organs</option>
                <option value="Specific Organ">Specific Organ</option>
            </select>
        </div>

        <div class="mb-3" id="specificOrganField" style="display: none;">
            <label class="form-label">Specify Organ</label>
            <input type="text" class="form-control" name="specific_organ">
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Usage Type</b></label>
            <select class="form-select" name="usage_type">
                <option value="Research">Research</option>
                <option value="Transplant">Transplant</option>
                <option value="Research and Transplant">Research and Transplant</option>
            </select>
        </div>

        <button type="submit" class="btn btn-danger w-100">Register</button>
    </form>
</div>

<script>
    function toggleSpecificOrgan() {
        var organType = document.getElementById("organType").value;
        var specificOrganField = document.getElementById("specificOrganField");
        if (organType === "Specific Organ") {
            specificOrganField.style.display = "block";
        } else {
            specificOrganField.style.display = "none";
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
