<?php
include('config.php'); // DB connection

function fetchData($conn, $table) {
    $result = mysqli_query($conn, "SELECT * FROM $table");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$meat_grades = fetchData($conn, 'meat_grades');
$packages = fetchData($conn, 'packages');
$transport_logs = fetchData($conn, 'transport_logs');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard - FinestMeatBD</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      min-height: 100vh;
      background-image: url('assets/meat1.jpg'); /* Use same image path */
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      position: relative;
    }
    body::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.4); /* subtle overlay */
      z-index: 0;
    }
    .sidebar {
      width: 240px;
      background-color: rgba(45, 55, 72, 0.9); /* semi-transparent dark */
      color: white;
      padding: 20px;
      flex-shrink: 0;
      position: relative;
      z-index: 1;
    }
    .sidebar h1 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      font-weight: bold;
    }
    .sidebar a {
      display: block;
      margin: 10px 0;
      color: #cbd5e0;
      text-decoration: none;
      font-size: 1rem;
    }
    .sidebar a:hover {
      color: white;
      text-decoration: underline;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
      position: relative;
      z-index: 1;
      background-color: rgba(255,255,255,0.9);
      overflow-x: auto;
    }
    table {
      width: 100%;
      margin-top: 10px;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #e2e8f0;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #edf2f7;
      font-weight: bold;
    }
    h2 {
      margin-top: 20px;
      font-size: 1.5rem;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h1>Admin Dashboard</h1>
    <a href="frontend/admindash.html">Dashboard Overview</a>
    <a href="frontend/production.html">Production</a>
    <a href="frontend/packaging.php">Packaging</a>
    <a href="frontend/health.html">Check Product Health</a>
    <a href="frontend/quality.php">Product Quality Trends</a>
    <a href="frontend/delivery.php">Deliveries</a>
    <a href="frontend/people.html">Users</a>
    <a href="index.php">Retailer Informations</a>
    <a href="adduser.php">Retailer Form</a>
  </div>

  <div class="content">
    <h2>Meat Grades</h2>
    <a href="export.php?table=meat_grades&type=csv" class="text-green-600 hover:underline">Export CSV</a> |
    <a href="export.php?table=meat_grades&type=pdf" class="text-green-600 hover:underline">Export PDF</a>
    <table>
      <thead><tr><?php foreach(array_keys($meat_grades[0] ?? []) as $col) echo "<th>$col</th>"; ?></tr></thead>
      <tbody><?php foreach($meat_grades as $row) { echo "<tr>"; foreach($row as $cell) echo "<td>$cell</td>"; echo "</tr>"; } ?></tbody>
    </table>

    <h2>Packages</h2>
    <a href="export.php?table=packages&type=csv" class="text-green-600 hover:underline">Export CSV</a> |
    <a href="export.php?table=packages&type=pdf" class="text-green-600 hover:underline">Export PDF</a>
    <table>
      <thead><tr><?php foreach(array_keys($packages[0] ?? []) as $col) echo "<th>$col</th>"; ?></tr></thead>
      <tbody><?php foreach($packages as $row) { echo "<tr>"; foreach($row as $cell) echo "<td>$cell</td>"; echo "</tr>"; } ?></tbody>
    </table>

    <h2>Transport Logs</h2>
    <a href="export.php?table=transport_logs&type=csv" class="text-green-600 hover:underline">Export CSV</a> |
    <a href="export.php?table=transport_logs&type=pdf" class="text-green-600 hover:underline">Export PDF</a>
    <table>
      <thead><tr><?php foreach(array_keys($transport_logs[0] ?? []) as $col) echo "<th>$col</th>"; ?></tr></thead>
      <tbody><?php foreach($transport_logs as $row) { echo "<tr>"; foreach($row as $cell) echo "<td>$cell</td>"; echo "</tr>"; } ?></tbody>
    </table>
  </div>
</body>
</html>
