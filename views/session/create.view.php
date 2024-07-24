<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form action="/login" method="post">
                <input type="email" name="email" placeholder="Email" required> <br>
                <input type="password" name="password" placeholder="Password" required>

                <p>
                    <?php if (isset($errors["password"]) || isset($errors["email"])) : ?>
                        <?= $errors["password"] ?? $errors["email"] ?>
                    <?php endif; ?>
                </p>

                <button>Login</button>
            </form>
        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>