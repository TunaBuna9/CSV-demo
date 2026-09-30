<?php
    // Array of arrasys - or multi dimensional array
    // To access "goodle Inc"
    // $data[0][1]
    $data = array(
        ['GOOG', 'Google Inc.', '800'],
        ['AAPL', 'Apple Inc.', '500'],
        ['AMZN', 'Amazon.com Inc.', '250'],
        ['YHOO', 'Yahoo! Inc.', '250'],
        ['FB', 'Facebook, Inc.', '30'],
    );

    $filename = "stock.csv";

    // OPens a filestream  to connects the filename to the pc
    // SEcond value, tells teh permsiision, ex read or write.
    $file = fopen($filename, 'w');

    // Checks if there was an error in opening the file.
    if($file === false){
        // "Die" ends the code, hard stop
        die("Error opening the file" . $filename);
    }

    foreach ($data as $row){
        // Fput, puts fata into the file
        fputcsv($file,$row);
    }

    fclose($file);
    // If errors, check permissions in files
?>