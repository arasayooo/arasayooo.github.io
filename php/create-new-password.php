<main>
    <div class="wrapper">
        <section class="default">

            <?php
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            if (empty($selector) || empty($validator)) {
                echo "Could not validate your request";
            } else {
                if (ctype_xdigit($selector) !== false && (ctype_xdigit($validator) !== false)) { ?>

                    <form action="includes/resest-password.php" method="POST">
                        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                        <input type="hidden" name="selector" value="<?php echo $validator; ?>">
                        <input type="password" name="pwd" placeholder="Enter a new password">
                        <input type="password" name="pwd-repeat" placeholder="repeatnew password">
                        <button type="submit" name="reset-submit">Reset password</button>
                    </form>

            <?php
                }
            }
            ?>
        </section>
    </div>
</main>