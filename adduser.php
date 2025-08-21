<?php
include 'config.php'; // Include your DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and collect form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $warehouse = mysqli_real_escape_string($conn, $_POST['warehouse']);
    $road = mysqli_real_escape_string($conn, $_POST['road']);
    $block = mysqli_real_escape_string($conn, $_POST['block']);
    $street_name = mysqli_real_escape_string($conn, $_POST['street_name']);
    $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    // Insert query
    $sql = "INSERT INTO retailers (first_name, middle_name, last_name, warehouse, road, block, street_name, postal_code, country) 
            VALUES ('$first_name', '$middle_name', '$last_name', '$warehouse', '$road', '$block', '$street_name', '$postal_code', '$country')";

    if (mysqli_query($conn, $sql)) {
        echo "Retailer added successfully!";
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
    <title>Add Retailer</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    body {
      position: relative;
      background-image: url('../Spring-25_CSE-303_Grading-Packaging-and-Transport-Management-System-for-Meat-Based-Products/assets/production.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
    }

    /* Creating an overlay to adjust the opacity of the background image */
    body::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(250, 250, 250, 0.61); /* Dark overlay with opacity */
      z-index: -1; /* Ensure overlay doesn't cover content */
    }


  </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
        <a href="../Spring-25_CSE-303_Grading-Packaging-and-Transport-Management-System-for-Meat-Based-Products\frontend/index.html" class="text-white text-xl font-bold">Finest Meat BD</a>
        <a href="index.php" class="text-white px-4 py-2">Retailers List</a>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Add New Retailer</h1>
        <form action="adduser.php" method="POST" class="bg-white p-8 rounded-md shadow-md">
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" name="first_name" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="warehouse" class="block text-sm font-medium text-gray-700">Warehouse</label>
                <input type="text" id="warehouse" name="warehouse" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="road" class="block text-sm font-medium text-gray-700">Road</label>
                <input type="text" id="road" name="road" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="block" class="block text-sm font-medium text-gray-700">Block</label>
                <input type="text" id="block" name="block" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="street_name" class="block text-sm font-medium text-gray-700">Street Name</label>
                <input type="text" id="street_name" name="street_name" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                <input type="text" id="postal_code" name="postal_code" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="country" name="country" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md">Add Retailer</button>
            </div>
        </form>
    </div>
</body>
</html>