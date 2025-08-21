<?php
include 'config.php'; // Include your DB connection

// Check if search term is passed
$search_term = '';
if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM retailers WHERE first_name LIKE '%$search_term%' OR last_name LIKE '%$search_term%' OR warehouse LIKE '%$search_term%'";
} else {
    // Fetch all retailers if no search term is provided
    $sql = "SELECT * FROM retailers";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finest Meat BD</title>
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
            <a href="adduser.php" class="text-white px-4 py-2">Add Retailer</a>
            <a href="../Spring-25_CSE-303_Grading-Packaging-and-Transport-Management-System-for-Meat-Based-Products\frontend/admindash.html" class="text-white px-4 py-2">Admin Dashboard</a>

        </div>
    </nav>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Retailer List</h1>

        <!-- Search Form -->
        <form action="index.php" method="POST" class="mb-6">
            <input type="text" name="search" class="w-full p-2 border border-gray-300 rounded-md" value="<?= htmlspecialchars($search_term); ?>" placeholder="Search by Name or Warehouse...">
            <button type="submit" class="w-full mt-2 bg-blue-600 text-white p-2 rounded-md">Search</button>
        </form>

        <!-- Retailers Table -->
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">First Name</th>
                    <th class="px-6 py-3 text-left">Last Name</th>
                    <th class="px-6 py-3 text-left">Warehouse</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4"><?= $row['first_name']; ?></td>
                        <td class="px-6 py-4"><?= $row['last_name']; ?></td>
                        <td class="px-6 py-4"><?= $row['warehouse']; ?></td>
                        <td class="px-6 py-4">
                            <a href="edituser.php?id=<?= $row['retailer_id']; ?>" class="text-blue-600">Edit</a> | 
                            <a href="deleteuser.php?id=<?= $row['retailer_id']; ?>" class="text-red-600">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>