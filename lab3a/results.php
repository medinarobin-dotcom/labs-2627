<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$agree = $_POST['agree'];
$answers = $_POST['answers'] ?? [];

$answer_string = '';

for ($i = 1; $i <= MAX_QUESTION_NUMBER; $i++) {
    $answer_string .= $answers[$i] ?? '';
}

$score = compute_score($answer_string);
$score_display = $score / 100;

$hero_class = $score_display > 2 ? 'is-success' : 'is-danger';

$formatted_birthdate = date('F d, Y', strtotime($birthdate));

$questions = retrieve_questions();
$correct_answers = get_answers();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />

    <?php if ($score_display == 5): ?>
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
    <?php endif; ?>
</head>
<body>
<section class="hero <?php echo $hero_class; ?>">
    <div class="hero-body">
        <p class="title">Your Score <?php echo $score_display; ?>/5</p>
        <p class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</p>
    </div>
</section>

<section class="section">
    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <tbody>
                <tr>
                    <th>Input Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Complete Name</td>
                    <td><?php echo htmlspecialchars($complete_name); ?></td>
                </tr>
                <tr class="is-selected">
                    <td>Email</td>
                    <td><?php echo htmlspecialchars($email); ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td><?php echo htmlspecialchars($formatted_birthdate); ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo htmlspecialchars($contact_number); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < MAX_QUESTION_NUMBER; $i++): ?>
                    <?php
                    $question = $questions['questions'][$i];
                    $user_answer_key = $answers[$i + 1] ?? '';
                    $correct_answer_key = $correct_answers[$i];

                    $user_answer = '';
                    $correct_answer = '';

                    foreach ($question['options'] as $option) {
                        if ($option['key'] == $user_answer_key) {
                            $user_answer = $option['value'];
                        }

                        if ($option['key'] == $correct_answer_key) {
                            $correct_answer = $option['value'];
                        }
                    }
                    ?>

                    <tr>
                        <td><?php echo htmlspecialchars($question['question']); ?></td>
                        <td><?php echo htmlspecialchars($correct_answer); ?></td>
                        <td><?php echo htmlspecialchars($user_answer); ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <?php if ($score_display == 5): ?>
    <canvas id="confetti-canvas"></canvas>
    <?php endif; ?>
</section>

<?php if ($score_display == 5): ?>
<script>
var confettiSettings = {
    target: 'confetti-canvas'
};
var confetti = new ConfettiGenerator(confettiSettings);
confetti.render();
</script>
<?php endif; ?>

</body>
</html>