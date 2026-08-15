<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

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
