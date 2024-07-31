<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <form action="/notes" method="post">
            <fieldset>
                <legend>Make it meaningful...</legend>
                <label for="text">Write your Note:</label>
                <textarea name="text" id="text" cols="30" minlength="8" rows="10"><?= isset($errors["text"]) ? $_POST['text'] ?? "" : "" ?></textarea>
            </fieldset>
            <?php if (isset($errors["text"])) : ?>
                <p class="flash danger">
                    <?= $errors["text"] ?>
                </p>
            <?php endif; ?>
            <p>
                <button class="active">Create Note</button>
            </p>
        </form>
    </main>

<?php require base_path('views/partials/footer.php'); ?>