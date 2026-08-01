<?php

$file = fopen("registrations.csv", "r");

$registrants = [];

while (($row = fgetcsv($file)) !== false) {
    $registrants[] = $row;
}

fclose($file);

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Registrants</title>
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
</head>

<body>

<h1>
    Registered Students
</h1>


<table border="1">

<thead>
<tr>
    <th>Complete Name</th>
    <th>Birthday</th>
    <th>Contact Number</th>
    <th>Sex</th>
    <th>Program</th>
    <th>Complete Address</th>
    <th>Email Address</th>
    <th>Password</th>
</tr>
</thead>


<tbody>

<?php foreach ($registrants as $student): ?>

<tr>

    <td><?php echo $student[0]; ?></td>
    <td><?php echo $student[1]; ?></td>
    <td><?php echo $student[2]; ?></td>
    <td><?php echo $student[3]; ?></td>
    <td><?php echo $student[4]; ?></td>
    <td><?php echo $student[5]; ?></td>
    <td><?php echo $student[6]; ?></td>
    <td><?php echo $student[7]; ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>


</body>
</html>