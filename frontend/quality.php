<?php
include('../config.php'); // DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['meat_type'];
    $grade = $_POST['grade'];
    $weight = $_POST['weight'];
    $date = $_POST['inspection_date'];

    $sql = "INSERT INTO meat_grades (meat_type, grade, weight, inspection_date)
            VALUES ('$type', '$grade', '$weight', '$date')";

    if (mysqli_query($conn, $sql)) {
        $message = "Meat grading saved successfully!";
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
  <title>Meat Grading - FinestMeatBD</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">
  <div class="bg-white p-8 rounded shadow-md w-full max-w-md mb-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Meat Grading Form</h2>
    <?php if(isset($message)) echo "<p class='mb-4 text-center text-green-500'>$message</p>"; ?>
    <form method="POST" action="quality.php" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Meat Type</label>
        <input type="text" name="meat_type" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Grade</label>
        <input type="text" name="grade" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Weight (kg)</label>
        <input type="number" step="0.01" name="weight" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Inspection Date</label>
        <input type="date" name="inspection_date" required class="mt-1 block w-full border border-gray-300 rounded p-2" />
      </div>
      <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Submit</button>
    </form>
  </div>

  <!-- Original HTML UI Below -->
  <div class="w-full"><!-- quality.html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quality Trends - FinestMeatBD</title>

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
      padding: 90px;
      background-color: rgba(201, 195, 195, 0.904);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    footer {
      background-color: #1a202c;
      color: white;
      text-align: center;
      padding: 20px;
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
      <h2 class="text-2xl font-semibold text-center mb-8">Quality Trends</h2>

      <!-- Quality Trends Chart -->
      <canvas id="qualityChart" height="100"></canvas>
    </div>

    <footer>
      &copy; 2025 FinestMeatBD. All rights reserved.
    </footer>
  </div>

  <script>
    // Sample data (replace with actual data from your backend)
    const labels = ['Product 1', 'Product 2', 'Product 3'];
    const grades = [90, 85, 95];

    // Chart.js - Quality Trends Chart
    const ctx = document.getElementById('qualityChart').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Quality Grade (%)',
          data: grades,
          borderColor: 'rgba(255, 159, 64, 1)',
          borderWidth: 2,
          fill: false
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
  </script>

</body>

</html></div>
</body>
</html>
