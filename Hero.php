<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Header Section -->
    <header class="text-center bg-primary text-white py-5">
        <div class="background-container d-flex flex-column justify-content-center align-items-center">
            <h1 class="display-4 fw-bold">Welcome to the Room Finder</h1>
            <p class="lead">Discover the perfect space for your needs with ease and efficiency.</p>
        </div>
    </header>

    <section id="mid-content" class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card p-4 shadow-sm h-100">
                        <h3 class="mb-3">Discover Amazing People</h3>
                        <p>Connect with our vibrant community for more innovation.</p>
                        <a href="Login.php" class="btn btn-primary mt-2">Get Started</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-4 shadow-sm h-100">
                        <h3 class="mb-3">Find a Home</h3>
                        <p>Use our platform to find your ideal room effortlessly.</p>
                        <a href="Login.php" class="btn btn-primary mt-2">Get Started</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-4 shadow-sm h-100">
                        <h3 class="mb-3">Empower Our Community</h3>
                        <p>Join us on social media and share your ideas to solve real-life challenges.</p>
                        <!-- Social Media Icons -->
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <a href="#" class="text-dark"><i class="fab fa-facebook-f fa-2x"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-twitter fa-2x"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-instagram fa-2x"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-linkedin-in fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="container mt-5 p-4 bg-white rounded shadow">
        <h2 class="text-center mb-4">About Us</h2>
        <div class="text-center mb-4">
            <h3 class="mt-3">AI ROBOTICS CLUB (M.C.A Department)</h3>
        </div>
        <p class="text-justify">Welcome to the AI Robotics Club (M.C.A Department) at SPU Mandi! We are a passionate group of students and enthusiasts dedicated to exploring the fascinating world of artificial intelligence and robotics. Our mission is to foster innovation and creativity in robotics by providing a collaborative environment where members can learn, build, and share ideas. We believe in the power of technology to solve real-world problems and enhance our daily lives.</p>
        <div class="text-end">
            <a href="about.php" class="btn btn-primary">Read More...</a>
        </div>
    </section>

    <!-- Feedback Form Section -->
    <section class="container mt-5 p-4 bg-light rounded shadow">
        <div class="col-md-6 mx-auto p-4 bg-white rounded shadow">
            <h2 class="text-center mb-4">Feedback Form</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $feedback = $_POST['feedback'];
                $conn = new mysqli("localhost", "root", "", "feedback_db");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $name, $email, $feedback);
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Feedback submitted successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Failed to submit feedback. Please try again.</div>";
                }
                $stmt->close();
                $conn->close();
            }
            ?>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Feedback</label>
                    <textarea name="feedback" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit Feedback</button>
            </form>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">What Our Users Say</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card p-3">
                        <p class="mb-2">"Room Finder helped me find the perfect apartment quickly and easily!"</p>
                        <strong>- Alice Johnson</strong>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-3">
                        <p class="mb-2">"Great platform with user-friendly interface and excellent support!"</p>
                        <strong>- Mark Smith</strong>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-3">
                        <p class="mb-2">"I found a room within a day! Highly recommended."</p>
                        <strong>- Sarah Lee</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>