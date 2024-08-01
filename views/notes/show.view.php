<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>

        <blockquote>
            <h3>#<?= $note['id'] ?></h3>
            <?= $note['text'] ?>
            <cite><?= \Core\Session::get('name') ?></cite>
        </blockquote>
        <p>
            <a href="/note/edit?id=<?= $note['id'] ?>"><button>Edit Note</button></a>
        </p>

        <form action="" method="post" class="flex space-between">
            <a href="/notes">< Back to Notes...</a>

            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="danger">Delete Note</button>
        </form>
    </main>

<?php require base_path('views/partials/footer.php'); ?>