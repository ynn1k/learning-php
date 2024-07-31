<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <form action="/register" method="post">
            <fieldset>
                <legend>Create new Account</legend>

                <label for="email">
                    Email:
                    <input type="email" name="email" placeholder="Email" required>
                </label>
                <label for="name">
                    Name:
                    <input type="text" name="name" placeholder="Name" required>
                </label>
                <label for="password">
                    Password:
                    <input type="password" name="password" placeholder="Password (min. 8 chars)" required>
                </label>

                <?php if (isset($errors["password"]) || isset($errors["email"])) : ?>
                    <p class="flash danger">
                        <?= $errors["password"] ?? $errors["email"] ?>
                    </p>
                <?php endif; ?>

                <button>Register</button>
            </fieldset>
        </form>
    </main>

<?php require base_path('views/partials/footer.php'); ?>