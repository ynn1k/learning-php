<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <form action="/note" method="post">
            <input type="hidden" name="_method" value="patch">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <fieldset>
                <legend>Make it more meaningful...</legend>
                <label for="text">Edit your Note:</label>
                <textarea name="text" id="text" cols="30" rows="10" minlength="8"><?= $note['text'] ?></textarea>
            </fieldset>
            <?php if (isset($errors["text"])) : ?>
                <p class="flash danger">
                    <?= $errors["text"] ?>
                </p>
            <?php endif; ?>

            <p>
                <a href="/notes">Cancel</a>
                <button class="active ml-1">Update</button>
            </p>
        </form>
    </main>

<?php require base_path('views/partials/footer.php'); ?>