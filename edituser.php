<?php
include 'config.php'; // Include your DB connection

// Check if retailer_id is passed in the URL
if (isset($_GET['id'])) {
    $retailer_id = $_GET['id'];

    // Fetch the retailer data
    $sql = "SELECT * FROM retailers WHERE retailer_id = '$retailer_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and collect form data
    $retailer_id = $_POST['retailer_id'];
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $warehouse = mysqli_real_escape_string($conn, $_POST['warehouse']);
    $road = mysqli_real_escape_string($conn, $_POST['road']);
    $block = mysqli_real_escape_string($conn, $_POST['block']);
    $street_name = mysqli_real_escape_string($conn, $_POST['street_name']);
    $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);  // Adding country field

    // Update query
    $sql = "UPDATE retailers SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', 
            warehouse = '$warehouse', road = '$road', block = '$block', street_name = '$street_name', postal_code = '$postal_code', country = '$country' 
            WHERE retailer_id = '$retailer_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Retailer updated successfully!";
        header("Location: index.php"); // Redirect after update
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Retailer</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php" class="text-white text-xl font-bold">CRUD System</a>
            <a href="index.php" class="text-white px-4 py-2">Home</a>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Retailer</h1>
        <form action="edituser.php" method="POST" class="bg-white p-8 rounded-md shadow-md">
            <input type="hidden" name="retailer_id" value="<?= $row['retailer_id']; ?>">

            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" name="first_name" class="w-full p-2 border border-gray-300 rounded-md" value="<?= $row['first_name']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name" class="w-full p-2 border border-gray-300 rounded-md" value="<?= $row['middle_name']; ?>">
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="w-full p-2 border border-gray-300 rounded-md" value="<?= $row['last_name']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="warehouse" class="block text-sm font-medium text-gray-700">Warehouse</label>
                <input type="text" id="warehouse" name="warehouse" class="w-full p-2 border border-gray-300 rounded-md" value="<?= $row['warehouse']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="road" class="block text-sm font-medium text-gray-700">Road</label>
                <input type="text" id="road" name="road" class="w-full p-2 border border-gray-300 rounded-md" value="<?= $row['road']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="block" class="block text-sm font-medium text-gray-700">Block</label>
                <input type="text" id="block" name="block" class="w-full p-2 border border-gray-300 rounded-md" value="<?= $row['block']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="street_name" class="block text-sm font-medium text-gray-700">Street Name</label>
                <input type="text" id="street_name" name="street_name" class="w-full p-2 border border-gray-300 rounded-md" value="<?= $row['street_name']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                <input type="text" id="postal_code" name="postal_code" class="w-full p-2 border border-gray-300 rounded-md" value="<?= $row['postal_code']; ?>" required>
            </div>

            <!-- Add Country field -->
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="country" name="country" class="w-full p-2 border border-gray-300 rounded-md" value="<?= $row['country']; ?>" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md">Update Retailer</button>
            </div>
        </form>
    </div>
</body>
</html>