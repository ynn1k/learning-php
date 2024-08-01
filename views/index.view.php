<?php require "partials/head.php"; ?>
<?php require "partials/nav.php"; ?>
<?php require "partials/banner.php"; ?>

    <main>
        <p>Hello there! <?= \Core\Session::get('name') ?? 'Guest' ?></p>
    </main>

<?php require "partials/footer.php"; ?>