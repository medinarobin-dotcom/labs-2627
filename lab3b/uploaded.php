<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

$uploaded_video_file = $upload_directory . basename($_FILES['video_file']['name']);
$temporary_file = $_FILES['video_file']['tmp_name'];

if (move_uploaded_file($temporary_file, $uploaded_video_file)) {
    $video_file = $relative_path . basename($_FILES['video_file']['name']);
    ?>
    <video controls width="640">
        <source src="<?php echo $video_file; ?>" type="video/mp4">
    </video>
    <?php
} else {
    echo 'Failed to upload file';
}