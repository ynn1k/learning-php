<?php

view('session/create.view.php', [
    'heading' => 'Login',
    'errors' => $_SESSION['_flash']['errors'] ?? []
]);