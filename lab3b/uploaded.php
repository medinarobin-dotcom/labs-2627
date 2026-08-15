<?php

$upload_directory = getcwd() . '/sample-files/';
$relative_path = '/sample-files/';

if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === 0) {
    $uploaded_file = $upload_directory . basename($_FILES['pdf_file']['name']);
    move_uploaded_file($_FILES['pdf_file']['tmp_name'], $uploaded_file);
    $file = $relative_path . basename($_FILES['pdf_file']['name']);
    ?>
    <iframe src="<?php echo $file; ?>" width="100%" height="600px"></iframe>
    <?php
}

if (isset($_FILES['audio_file']) && $_FILES['audio_file']['error'] === 0) {
    $uploaded_file = $upload_directory . basename($_FILES['audio_file']['name']);
    move_uploaded_file($_FILES['audio_file']['tmp_name'], $uploaded_file);
    $file = $relative_path . basename($_FILES['audio_file']['name']);
    ?>
    <audio controls>
        <source src="<?php echo $file; ?>" type="audio/mpeg">
    </audio>
    <?php
}

if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === 0) {
    $uploaded_file = $upload_directory . basename($_FILES['image_file']['name']);
    move_uploaded_file($_FILES['image_file']['tmp_name'], $uploaded_file);
    $file = $relative_path . basename($_FILES['image_file']['name']);
    ?>
    <img src="<?php echo $file; ?>" alt="Uploaded image">
    <?php
}

if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] === 0) {
    $uploaded_file = $upload_directory . basename($_FILES['video_file']['name']);
    move_uploaded_file($_FILES['video_file']['tmp_name'], $uploaded_file);
    $file = $relative_path . basename($_FILES['video_file']['name']);
    ?>
    <video controls width="640">
        <source src="<?php echo $file; ?>" type="video/mp4">
    </video>
    <?php
}