<?php

require "helpers/helper-functions.php";

session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$agree = $_POST['agree'];

if (
    empty($email) ||
    empty($password) ||
    empty($agree)
) {
    header("Location: step-3.php");
    exit;
}

$password = password_hash($password, PASSWORD_DEFAULT);

$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['agree'] = $agree;

$formattedBirthday = date("F d, Y", strtotime($_SESSION['birthday']));

$birth = new DateTime($_SESSION['birthday']);
$today = new DateTime();

$age = $today->diff($birth)->y;
$_SESSION['age'] = $age;

$_SESSION['birthday'] = $formattedBirthday;

$form_data = $_SESSION;

$file = fopen("registrations.csv", "a");

fputcsv($file, [
    $_SESSION['fullname'],
    $_SESSION['birthday'],
    $_SESSION['age'],
    $_SESSION['contact'],
    $_SESSION['sex'],
    $_SESSION['program'],
    $_SESSION['address'],
    $_SESSION['email'],
]);

fclose($file);

dump_session();

session_destroy();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Thank You Page
        </h1>
      </div>
      <div class="p-section--shallow">
      
        <table aria-label="Session Data">
            <thead>
                <tr>
                    <th></th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($form_data as $key => $val):
            ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td>
                      <?php echo $val; ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
      

      </div>
    </div>
  </div>
</section>

</body>
</html>