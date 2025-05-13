<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration - DonorSpot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="patient.css">
</head>
<body>
<nav class="navbar">
        <a class="navbar-brand" href="#">DonorSpot</a>
        <ul class="navbar-nav">
            <li><a href="userindex.php"><b>Home</b></a></li>
        </ul>
    </nav>
   <div class="container">
    <h2 class="text-center text-danger"><b>Patient Registration for Organ Donation</b></h2>
        
        
		<form action="register_patient.php" method="POST">
            <div class="mb-3">
                <label class="form-label"><b>Full Name</b></label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><b>Age</b></label>
                <input type="number" class="form-control" name="age" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><b>Gender</b></label><br>
                <input type="radio" name="gender" value="Male" required> Male
                <input type="radio" name="gender" value="Female"> Female
                <input type="radio" name="gender" value="Other"> Other
            </div>

            <div class="mb-3">
                <label class="form-label"><b>Blood Group</b></label>
                <select class="form-control" name="blood_group" required>
                    <option value="">Select</option>
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
                <label class="form-label"><b>Required Organ</b></label>
                <select class="form-control" name="organ_needed" required>
                    <option value="">Select</option>
                    <option value="Kidney">Kidney</option>
                    <option value="Liver">Liver</option>
                    <option value="Heart">Heart</option>
                    <option value="Lungs">Lungs</option>
                    <option value="Eye">Eye</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label"><b>Phone Number</b></label>
                <input type="tel" class="form-control" name="phone" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><b>Email</b></label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><b>Address</b></label>
                <textarea class="form-control" name="address" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-danger">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
