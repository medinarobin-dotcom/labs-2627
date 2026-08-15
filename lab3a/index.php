<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IPT10 Laboratory Activity #3A</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
</head>

<body>

<section class="section">

    <div class="container">

        <div class="columns is-centered">

            <div class="column is-half">

                <h1 class="title has-text-centered">
                    User Registration
                </h1>

                <h2 class="subtitle has-text-centered">
                    This is the IPT10 PHP Quiz Web Application
                    Laboratory Activity. Please register.
                </h2>

                <form method="POST" action="instructions.php">
                    <div class="field">
                        <label class="label" for="complete_name">
                            Complete Name
                        </label>
                        <div class="control">
                            <input
                                class="input"
                                type="text"
                                id="complete_name"
                                name="complete_name"
                                placeholder="Enter your complete name"
                            >
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="email">
                            Email Address
                        </label>
                        <div class="control">
                            <input
                                class="input"
                                type="email"
                                id="email"
                                name="email"
                                placeholder="example@email.com"
                            >
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="birthdate">
                            Birthdate
                        </label>
                        <div class="control">
                            <input
                                class="input"
                                type="date"
                                id="birthdate"
                                name="birthdate"
                            >
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="contact_number">
                            Contact Number
                        </label>
                        <div class="control">
                            <input
                                class="input"
                                type="tel"
                                id="contact_number"
                                name="contact_number"
                                placeholder="09XXXXXXXXX"
                            >
                        </div>
                    </div>


                    <!-- Next button -->
                    <div class="field">
                        <div class="control">
                            <button
                                type="submit"
                                id="nextButton"
                                class="button is-link is-fullwidth"
                                disabled
                            >
                                Proceed Next
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</section>

<script>

    const completeName = document.getElementById("complete_name");
    const email = document.getElementById("email");
    const nextButton = document.getElementById("nextButton");

    function validateForm() {

        const nameIsValid =
            completeName.value.trim() !== "";

        const emailIsValid =
            email.value.trim() !== "" &&
            email.validity.valid;


        nextButton.disabled =
            !(nameIsValid && emailIsValid);
    }

    completeName.addEventListener("input", validateForm);
    email.addEventListener("input", validateForm);
    validateForm();

</script>

</body>
</html>