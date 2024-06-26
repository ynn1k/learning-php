<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <form action="/notes" method="post">
                <p>
                    <label for="text">Note:</label><br>
                    <textarea name="text" id="text" cols="30" rows="10"><?= isset($errors["text"]) ? $_POST['text'] ?? "" : "" ?></textarea>
                </p>
                <p>
                    <?php if (isset($errors["text"])) : ?>
                        <?= $errors["text"] ?>
                    <?php endif; ?>
                </p>
                <p>
                    <button>Create</button>
                </p>
            </form>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>