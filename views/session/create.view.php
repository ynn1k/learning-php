<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <form action="/login" method="post">
            <fieldset>
                <label for="">
                    Email:
                    <input type="email" name="email" placeholder="Email" required value="<?= oldInput('email') ?>">
                </label>
                <label for="">
                    Password:
                    <input type="password" name="password" placeholder="Password" required>
                </label>

                <?php if (isset($errors["password"]) || isset($errors["email"])) : ?>
                    <p class="flash danger">
                        <?= $errors["password"] ?? $errors["email"] ?>
                    </p>
                <?php endif; ?>

                <button class="active">Login</button>
            </fieldset>
        </form>
    </main>

<?php require base_path('views/partials/footer.php'); ?>