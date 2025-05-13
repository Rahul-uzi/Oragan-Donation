<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - DonorSpot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:beige;
        }
	
        .signup-container {
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 400px;
			
        }
        input {
            width: 94%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkred;
        }
		/* 🔹 Navigation Bar */
nav {
    background: red;
    padding: 2px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}

/* 🔹 Logo */
.logo {
    font-size: 30px;
    font-weight: bold;
    color: white;
}

/* 🔹 Navigation Links */
.nav-left {
    display: flex;
    list-style: none;
}

.nav-left li {
    margin-right: 25px;
}

.nav-left li a {
    text-decoration: none;
    color: white;
    font-size: 18px;
    padding: 10px 15px;
    transition: all 0.3s;
}

.nav-left li a:hover {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 8px;
}
    </style>
</head>
<body>

<!-- 🔹 Navigation Bar -->
    <nav>
        <div class="logo"> DonorSpot</div>
        <ul class="nav-left">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

<div class="signup-container">
    <h1 style="text-align:center;"><b>Sign Up</b></h1>
    <form action="signup_process.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <div style="position: relative;">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <button type="button" onclick="togglePassword()" style="position: absolute; right: 10px; top: 10px; background: none; border: none; cursor: pointer; color: #666;">
                👁️
            </button>
        </div>
        <button type="submit">Register</button>
    </form>
	<p>Login to existing account <a href="login.php">Login here</a></p>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
}
</script>

</body>
</html>

