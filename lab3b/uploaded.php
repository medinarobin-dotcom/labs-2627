<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

$uploaded_image_file = $upload_directory . basename($_FILES['image_file']['name']);
$temporary_file = $_FILES['image_file']['tmp_name'];

if (move_uploaded_file($temporary_file, $uploaded_image_file)) {
    $image_file = $relative_path . basename($_FILES['image_file']['name']);
    ?>
    <img src="<?php echo $image_file; ?>" alt="Uploaded image">
    <?php
} else {
    echo 'Failed to upload file';
}