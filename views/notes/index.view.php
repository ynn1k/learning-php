<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <ul>
                <?php foreach ($notes as $note) : ?>
                    <li><a href="/note?id=<?= $note['id'] ?>"><?= $note['text'] ?></a></li>
                <?php endforeach; ?>
            </ul>

            <p>
                <a href="/note/create">New Note</a>
            </p>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>