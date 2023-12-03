<?php

if (isset($_POST["email"])) {
    $_POST["email"] = htmlspecialchars($_POST["email"]);
    var_dump($_POST["email"]);

    // Read CSV file
    $csvFile = 'example.csv';
    $csvData = file_get_contents($csvFile);

// Parse CSV data
    $rows = array_map('str_getcsv', explode("\n", $csvData));
    $headers = array_shift($rows); // Assuming the first row contains headers

// Process CSV data
    foreach ($rows as $row) {
        $rowData = array_combine($headers, $row);
        // Do something with $rowData
        print_r($rowData);
    }

// Write to CSV file
    $newCsvData = $_POST["email"] ;
    file_put_contents('new_example.csv', $newCsvData);
    die();
}