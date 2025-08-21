<?php
include('../config.php'); // DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_id = $_POST['package_id'];
    $status = $_POST['status'];
    $updated_at = date('Y-m-d');

    $sql = "INSERT INTO packages (package_id, status, updated_at)
            VALUES ('$package_id', '$status', '$updated_at')
            ON DUPLICATE KEY UPDATE status='$status', updated_at='$updated_at'";

    if (mysqli_query($conn, $sql)) {
        $message = "Packaging status updated.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Packaging Management - FinestMeatBD</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">
  <div class="bg-white p-8 rounded shadow-md w-full max-w-md mb-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Packaging Status Form</h2>
    <?php if(isset($message)) echo "<p class='mb-4 text-center text-green-500'>$message</p>"; ?>
    <form method="POST" action="packaging.php" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Package ID</label>
        <input type="text" name="package_id" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status" required class="mt-1 block w-full border border-gray-300 rounded p-2">
          <option value="Pending">Pending</option>
          <option value="Packed">Packed</option>
          <option value="Sealed">Sealed</option>
        </select>
      </div>
      <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Update</button>
    </form>
  </div>

  <!-- Original HTML UI Below -->
  <div class="w-full"><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Packaging Tracking - FinestMeatBD</title>
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Flowbite CDN -->
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background-image: url('../assets/meat1.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      transition: background-image 1s ease-in-out;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .main-content {
      flex: 1;
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.8);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    footer {
      background-color: #1a202c;
      color: white;
      text-align: center;
      padding: 20px;
    }

    .btn-green {
      background-color: #32CD32;
      color: white;
      padding: 10px 20px;
      border-radius: 6px;
      font-weight: 600;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .btn-green:hover {
      background-color: #28a745;
    }

    .card-shadow {
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
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
      <h2 class="text-2xl font-semibold text-center mb-8">Packaging Tracking</h2>

      <!-- Packaging Data Form -->
      <form id="packagingForm" class="form-grid">
        <div class="input-group">
          <label for="productId">Product ID</label>
          <input type="text" id="productId" required />
        </div>
        <div class="input-group">
          <label for="packagingDate">Packaging Date</label>
          <input type="date" id="packagingDate" required />
        </div>
        <div class="input-group">
          <label for="packageWeight">Package Weight (kg)</label>
          <input type="number" id="packageWeight" step="0.1" required />
        </div>
        <button type="submit">Track</button>
      </form>

      <!-- Packaging Data Chart -->
      <canvas id="packagingChart" height="100"></canvas>
    </div>

    <!-- Footer -->
    <footer>
      &copy; 2025 FinestMeatBD. All rights reserved.
    </footer>
  </div>

  <script>
    // Sample data (replace with actual data from your backend)
    const labels = ['Product 1', 'Product 2', 'Product 3'];
    const weights = [5, 6, 5.5];

    // Chart.js - Packaging Data Chart
    const ctx = document.getElementById('packagingChart').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Package Weight (kg)',
          data: weights,
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Handle form submission
    document.getElementById('packagingForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const productId = document.getElementById('productId').value;
      const packagingDate = document.getElementById('packagingDate').value;
      const packageWeight = parseFloat(document.getElementById('packageWeight').value);

      // Simulate adding the new data to the chart (real-world app will save it to DB)
      chart.data.labels.push(productId);
      chart.data.datasets[0].data.push(packageWeight);

      // Update the chart
      chart.update();

      // Reset form
      this.reset();
    });
  </script>

</body>
</html>
</div>
</body>
</html>
