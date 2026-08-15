<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

<<<<<<< HEAD
<<<<<<< HEAD
$uploaded_pdf_file = $upload_directory . basename($_FILES['pdf_file']['name']);
$temporary_file = $_FILES['pdf_file']['tmp_name'];

if (move_uploaded_file($temporary_file, $uploaded_pdf_file)) {
    $pdf_file = $relative_path . basename($_FILES['pdf_file']['name']);
    ?>
    <iframe src="<?php echo $pdf_file; ?>" width="100%" height="600px"></iframe>
    <?php
} else {
    echo 'Failed to upload file';
}
=======
$uploaded_audio_file = $upload_directory . basename($_FILES['audio_file']['name']);
$temporary_file = $_FILES['audio_file']['tmp_name'];

if (move_uploaded_file($temporary_file, $uploaded_audio_file)) {
    $audio_file = $relative_path . basename($_FILES['audio_file']['name']);
    ?>
    <audio controls>
        <source src="<?php echo $audio_file; ?>" type="audio/mpeg">
    </audio>
    <?php
} else {
    echo 'Failed to upload file';
}
>>>>>>> audio-file-upload
=======
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
>>>>>>> image-file-upload
