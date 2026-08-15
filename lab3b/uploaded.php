<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

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