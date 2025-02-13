<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in to see room details.'); window.location.href='signin.php';</script>";
    exit();
}

$conn = new mysqli("localhost", "root", "", "room_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);
$rooms = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();

$roomsPerPage = 9;
$totalRooms = count($rooms);
$totalPages = ceil($totalRooms / $roomsPerPage);
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$startIndex = ($currentPage - 1) * $roomsPerPage;
$currentRooms = array_slice($rooms, $startIndex, $roomsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Rooms</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class='text-center mb-4'>Available Rooms</h1>
        <div class="row">
            <?php foreach ($currentRooms as $room): ?>
                <div class="col-md-4 mb-4">
                    <div class="card p-3 shadow-sm">
                        <h2 class='h5'><?php echo htmlspecialchars($room['roomType']); ?></h2>
                        <p><strong>Landlord:</strong> <?php echo htmlspecialchars($room['landLordName']); ?></p>
                        <p><strong>Location:</strong> <?php echo htmlspecialchars($room['location']); ?></p>
                        <p><strong>Address:</strong> <?php echo htmlspecialchars($room['address']); ?></p>
                        <p><strong>Contact No:</strong> <?php echo htmlspecialchars($room['contactNo']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="btn <?php echo ($i == $currentPage) ? 'btn-primary' : 'btn-secondary'; ?> mx-1"> <?php echo $i; ?> </a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>
