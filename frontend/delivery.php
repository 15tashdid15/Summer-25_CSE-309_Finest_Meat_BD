<?php
include('../config.php'); // DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $batch_id = $_POST['batch_id'];
    $vehicle = $_POST['vehicle_no'];
    $status = $_POST['status'];
    $departure = $_POST['departure_date'];

    $sql = "INSERT INTO transport_logs (batch_id, vehicle_no, status, departure_date)
            VALUES ('$batch_id', '$vehicle', '$status', '$departure')";

    if (mysqli_query($conn, $sql)) {
        $message = "Transport log added.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delivery Management - FinestMeatBD</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">
  <div class="bg-white p-8 rounded shadow-md w-full max-w-md mb-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Transport Management Form</h2>
    <?php if(isset($message)) echo "<p class='mb-4 text-center text-green-500'>$message</p>"; ?>
    <form method="POST" action="delivery.php" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Batch ID</label>
        <input type="text" name="batch_id" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Vehicle No.</label>
        <input type="text" name="vehicle_no" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status" required class="mt-1 block w-full border border-gray-300 rounded p-2">
          <option value="In-Transit">In-Transit</option>
          <option value="Delivered">Delivered</option>
          <option value="Delayed">Delayed</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Departure Date</label>
        <input type="date" name="departure_date" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
      </div>
      <button type="submit" class="w-full bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600">Submit</button>
    </form>
  </div>

  <!-- Original HTML UI Below -->
  <div class="w-full"><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FinestMeatBD - Delivery</title>
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Leaflet.js CDN for maps -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    body {
      background-image: url('../assets/delivery.jpg'); /* Add your background image */
      background-size: contain;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      transition: background-image 1s ease-in-out;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      /* Add an overlay for subtle effect */
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5); /* Dark overlay to enhance readability */
      z-index: -1; /* Ensure the overlay is behind the content */
    }

    .main-content {
      flex: 1;
    }

    /* Map Container Styling */
    .map-container {
      height: 400px;  /* Adjusted height for the map */
      width: 100%;    /* Full width */
      border-radius: 10px; /* Optional: rounded corners */
      margin-top: 20px;
    }

    footer {
      padding: 1rem;
      text-align: center;
      background-color: #1a202c;
      color: white;
      margin-top: auto;
    }

    .btn-green {
      background-color: #32CD32;
      color: white;
      padding: 8px 16px;
      border-radius: 6px;
      font-weight: 600;
      transition: background 0.3s;
    }

    .btn-green:hover {
      background-color: #28a745;
    }

    .card-shadow {
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
    }

    table {
      width: 100%;
      margin-top: 30px;
      border-collapse: collapse;
    }

    table th, table td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    table th {
      background-color: #32CD32;
      color: white;
    }

    table td {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>

  <div class="flex flex-col min-h-screen">
    <!-- Top Navbar -->
    <header class="flex justify-between items-center bg-white bg-opacity-90 shadow p-4">
      <a href="index.html" class="text-2xl font-bold">FinestMeatBD</a>
      <div class="flex gap-4">
        <a href="../dashboard.php" class="btn-green">Dashboard</a>
        <a href="index.html" class="btn-green">Home</a>
      </div>
    </header>

    <div class="main-content">
      <!-- Delivery Content Section -->
      <section class="p-6 bg-white bg-opacity-80 rounded-t-3xl">
        <h2 class="text-2xl font-semibold text-center mb-8">Delivery Information</h2>
        
        <!-- Map Container (Placeholder turned into actual map) -->
        <div id="map" class="map-container"></div>
        <p class="text-center mt-4">Tracking delivery in real-time...</p>
        
        <!-- Dummy Delivery Data Table -->
        <table>
          <thead>
            <tr>
              <th>Delivery ID</th>
              <th>Product</th>
              <th>Destination</th>
              <th>Estimated Time</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#D001</td>
              <td>Premium Beef Cuts</td>
              <td>Dhaka</td>
              <td>2:00 PM</td>
              <td>In Transit</td>
            </tr>
            <tr>
              <td>#D002</td>
              <td>Fresh Mutton</td>
              <td>Chittagong</td>
              <td>3:00 PM</td>
              <td>Delivered</td>
            </tr>
            <tr>
              <td>#D003</td>
              <td>Chicken Variety</td>
              <td>Khulna</td>
              <td>4:00 PM</td>
              <td>In Transit</td>
            </tr>
            <tr>
              <td>#D004</td>
              <td>Cold Cuts</td>
              <td>Rajshahi</td>
              <td>5:00 PM</td>
              <td>Delivered</td>
            </tr>
          </tbody>
        </table>
      </section>
    </div>

    <footer>
      &copy; 2025 FinestMeatBD. All rights reserved.
    </footer>
  </div>

  <script>
    // Initialize Leaflet map
    const map = L.map('map').setView([23.685, 90.3563], 13); // Centering map on Bangladesh (for simulation)

    // Add tile layer (OpenStreetMap tiles)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Create a marker and add it to the map (initial position)
    const deliveryMarker = L.marker([23.685, 90.3563]).addTo(map)
      .bindPopup('<b>Delivery Truck</b><br>Tracking...').openPopup();

    // Function to simulate random delivery movement (randomly generate coordinates)
    function generateRandomCoordinates() {
      // Randomize lat and long within a small area around Bangladesh
      const lat = 23.685 + (Math.random() - 0.5) * 0.05; // Randomly generate lat within +/- 0.05
      const lon = 90.3563 + (Math.random() - 0.5) * 0.05; // Randomly generate lon within +/- 0.05
      return [lat, lon];
    }

    // Simulate delivery movement every 3 seconds
    setInterval(() => {
      const newCoords = generateRandomCoordinates();

      // Update the marker position to simulate movement
      deliveryMarker.setLatLng(newCoords);

      // Optionally, update the popup content
      deliveryMarker.setPopupContent(`<b>Delivery Truck</b><br>Tracking: (${newCoords[0].toFixed(5)}, ${newCoords[1].toFixed(5)})`);
    }, 3000); // Update every 3 seconds for simulation
  </script>

  <!-- Subtle background overlay -->
  <div class="overlay"></div>

</body>
</html>
</div>
</body>
</html>
