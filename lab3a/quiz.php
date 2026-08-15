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

$questions = retrieve_questions();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>
<body>
<section class="section">
    <h1 class="title">Quiz</h1>

    <form method="POST" action="results.php" id="quizForm">
        <input type="hidden" name="complete_name" value="<?php echo htmlspecialchars($complete_name); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />
        <input type="hidden" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" />
        <input type="hidden" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" />
        <input type="hidden" name="agree" value="<?php echo htmlspecialchars($agree); ?>" />

        <?php $question_number = 1; ?>

        <?php foreach ($questions['questions'] as $question): ?>

            <?php $options = get_options_for_question_number($question_number); ?>

            <div class="box">
                <h2 class="subtitle">
                    Question <?php echo $question_number; ?> / <?php echo MAX_QUESTION_NUMBER; ?>
                </h2>

                <h3 class="title is-5">
                    <?php echo htmlspecialchars($question['question']); ?>
                </h3>

                <?php foreach ($options as $option): ?>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input
                                    type="radio"
                                    name="answers[<?php echo $question_number; ?>]"
                                    value="<?php echo htmlspecialchars($option['key']); ?>"
                                    required
                                />
                                <?php echo htmlspecialchars($option['value']); ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php $question_number++; ?>

        <?php endforeach; ?>

        <button type="submit" class="button">Submit</button>
    </form>
</section>

<script>
    setTimeout(function () {
        document.getElementById('quizForm').submit();
    }, 60000);
</script>

</body>
</html>