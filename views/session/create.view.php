<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <form action="/login" method="post">
            <input type="email" name="email" placeholder="Email" required value="<?= oldInput('email') ?>"> <br>
            <input type="password" name="password" placeholder="Password" required>

            <?php if (isset($errors["password"]) || isset($errors["email"])) : ?>
                <p class="flash danger">
                    <?= $errors["password"] ?? $errors["email"] ?>
                </p>
            <?php endif; ?>

            <button>Login</button>
        </form>
    </main>

<?php require base_path('views/partials/footer.php'); ?>