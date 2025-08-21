<?php
include('config.php'); // DB connection

$table = $_GET['table'] ?? '';
$type = $_GET['type'] ?? '';

if (!in_array($table, ['meat_grades', 'packages', 'transport_logs'])) {
    die("Invalid table.");
}

$result = mysqli_query($conn, "SELECT * FROM $table");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($type === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=' . $table . '.csv');
    $output = fopen('php://output', 'w');
    if (!empty($data)) {
        fputcsv($output, array_keys($data[0]));
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
    }
    fclose($output);
    exit();
}

if ($type === 'pdf') {
    require('fpdf.php'); // Ensure this file is present or use TCPDF if preferred

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);

    if (!empty($data)) {
        foreach (array_keys($data[0]) as $col) {
            $pdf->Cell(40,10,$col,1);
        }
        $pdf->Ln();
        $pdf->SetFont('Arial','',12);
        foreach ($data as $row) {
            foreach ($row as $cell) {
                $pdf->Cell(40,10,$cell,1);
            }
            $pdf->Ln();
        }
    } else {
        $pdf->Cell(0,10,"No data available",1,1);
    }

    $pdf->Output();
    exit();
}

echo "Invalid export type.";
?>
