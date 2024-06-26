<?php

use Core\App;
use Core\Database;

$db = App::container()->resolve(Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorized($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = ?', [$_POST['id']]);

header('Location: /notes');
exit();
