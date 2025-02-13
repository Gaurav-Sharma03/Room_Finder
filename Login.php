<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Database connection
    $conn = new mysqli("localhost", "root", "", "users_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            echo "<script>alert('Login successful!'); window.location.href='rooms.php';</script>";
        } else {
            echo "<script>alert('Invalid credentials. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials. Please try again.');</script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require('Header.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <form method="POST" class="border p-4 rounded shadow-sm bg-light">
            <h2 class="text-center mb-4">Login In</h2>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Log In</button>
            <p class="text-center mt-3">Don't have an account? <a href="signupForm.php">Register here</a></p>
        </form>
    </div>
    <footer class="bg-dark text-light py-5">
  <div class="container">
    <div class="row mb-4">
      <div class="col-md-4 text-center mb-3">
        <img src="/Images/AI.png" class="rounded-circle mb-2" alt="AI SPU Logo" style="height: 60px;">
        <h3 class="fw-bold">AI ROBOTICS CLUB (M.C.A Department)</h3>
        <p class="text-muted">
          The AI Robotics Club (M.C.A Department) at SPU Mandi is a vibrant community dedicated to exploring AI and robotics.
          Our club fosters innovation, creativity, and hands-on learning through various activities, workshops, and projects.
        </p>
      </div>

      <div class="col-md-2">
        <h5 class="text-uppercase mb-3">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-light text-decoration-none">About Us</a></li>
          <li><a href="#" class="text-light text-decoration-none">FAQ's</a></li>
          <li><a href="#" class="text-light text-decoration-none">Support</a></li>
        </ul>
      </div>

      <div class="col-md-3">
        <h5 class="text-uppercase mb-3">Resources</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-light text-decoration-none">Guides</a></li>
          <li><a href="#" class="text-light text-decoration-none">Case Study</a></li>
          <li><a href="#" class="text-light text-decoration-none">Webinars</a></li>
          <li><a href="#" class="text-light text-decoration-none">Testimonials</a></li>
        </ul>
      </div>

      <div class="col-md-3">
        <h5 class="text-uppercase mb-3">Legal</h5>
        <ul class="list-unstyled">
          <li><a href="/PrivacyPolicy" class="text-light text-decoration-none">Privacy Policy</a></li>
          <li><a href="/TermsAndConditions" class="text-light text-decoration-none">Terms & Conditions</a></li>
        </ul>
      </div>
    </div>

    <hr class="border-secondary mb-4" />

    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
      <span class="text-white mb-3 mb-sm-0">© 2024 AI ROBOTICS CLUB™. All Rights Reserved.</span>
      <div class="d-flex gap-3">
        <a href="#" class="text-light" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-light" aria-label="Discord"><i class="fab fa-discord"></i></a>
        <a href="#" class="text-light" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-light" aria-label="GitHub"><i class="fab fa-github"></i></a>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
