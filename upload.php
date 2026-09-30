<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Creates a superglobal variable below and turns the value into an associative array
        $uploadedFile = $_FILES['datafile'];

        // Registers, but does not have a location yet, it's a temp file - Below for example output
        // print_r($uploadedFile);

        // Array ( 
        // [name] => ninjago.jpg 
        // [full_path] => ninjago.jpg
        // [type] => image/jpeg
        // [tmp_name] => /Applications/XAMPP/xamppfiles/temp/phpmfA92v 
        // [error] => 0 
        // [size] => 41119 ) 


        // Building a permantent location for the image
        $filename = basename($uploadedFile['name']);
        echo($filename);

        // Where to store file 
        // Based on the index, rather than hardcoded
        $destination = __DIR__ . '/uploads/' . $filename;
        echo ($destination);

        // Moves the file out the php's temp upload loction
        move_uploaded_file(
            $uploadedFile['tmp_name'],
            $destination
        );

        // IF NOT WORKING MANUALLY CREATE AN UPLOADS FOLDER AND CHECK PERMISSIONS - SET TO READ AND WRITE IF NEEDED
    }

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uploaded Image</title>
</head>

<body>
    <h1>Uploaded Image</h1>

    <?php if ($filename): ?>
        <img
            src="uploads/<?= htmlspecialchars($filename) ?>"
            alt="Uploaded image"
            width="200"    
            >

        <p><?= htmlspecialchars($filename) ?></p>
    <?php else: ?>
        <p>No image has been uploaded.</p>
    <?php endif; ?>

    <p><a href="index.php">Upload another image</a></p>
</body>

</html>