<main>
    <div class="wrapper">
        <section class="default">
            <h1>Reset your password</h1>
            <p>An email will be send to you with insturctions on how to reset your password. </p>

            <form action="reset-request.php" method="POST">
                <input type="text" name="email" placeholder="Enter your e-mail address">
                <button type="submit" name="reset-submit">recovery</button>
            </form>
            <?php
            if (isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") {
                    echo '<p class"signupsuccess">check your e-mail</p>';
                }
            }
            ?>
        </section>
    </div>
</main>