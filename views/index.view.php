<?php require "partials/head.php"; ?>
<?php require "partials/nav.php"; ?>
<?php require "partials/banner.php"; ?>

    <main>
        <p>Hello there! <?= $_SESSION['user']['name'] ?? 'Guest' ?></p>
    </main>

<?php require "partials/footer.php"; ?>