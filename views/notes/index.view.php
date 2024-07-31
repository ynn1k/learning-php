<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li><a href="/note?id=<?= $note['id'] ?>"><?= $note['text'] ?></a></li>
            <?php endforeach; ?>
        </ul>

        <p>
            <a href="/note/create"><button class="active">New Note</button></a>
        </p>
    </main>

<?php require base_path('views/partials/footer.php'); ?>