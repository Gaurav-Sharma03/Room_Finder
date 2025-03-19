<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Finder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function toggleMenu() {
            let menu = document.getElementById("mobile-menu");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }
    </script>
</head>
<body>
    <header class="bg-white border-bottom shadow-sm">
       
        <div class="container d-flex justify-content-between align-items-center py-3">
            <!-- Logo -->
            <div class="d-flex align-items-center">
                <h1 class="display-4 fw-bold text-success mb-0">Room Finder</h1>
            </div>

            <!-- Navigation Menu -->
            <nav class="d-none d-sm-flex">
                <a href="index.php" class="btn btn-outline-dark me-2 <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
                <a href="about.php" class="btn btn-outline-dark me-2 <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a>
                <a href="Rooms.php" class="btn btn-outline-dark me-2 <?php echo ($current_page == 'Rooms.php') ? 'active' : ''; ?>">Room</a>
                <a href="Login.php" class="btn btn-outline-dark me-2 <?php echo ($current_page == 'Login.php') ? 'active' : ''; ?>">Log In</a>
                <a href="Signin.php" class="btn btn-outline-dark <?php echo ($current_page == 'signin.php') ? 'active' : ''; ?>">Sign In</a>
            </nav>

            

            <!-- Mobile Menu Button -->
            <button class="btn btn-dark d-sm-none" onclick="toggleMenu()">☰</button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="d-sm-none bg-dark p-3" style="display: none;">
            <a href="index.php" class="d-block text-white py-2">Home</a>
            <a href="about.php" class="d-block text-white py-2">About</a>
            <a href="Rooms.php" class="d-block text-white py-2">Room</a>
            <a href="Login.php" class="d-block text-white py-2">Log In</a>
            <a href="signin.php" class="d-block text-white py-2">Sign In</a>
            <div class="d-flex gap-3 mt-3">
                <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </header>
</body>
</html>
