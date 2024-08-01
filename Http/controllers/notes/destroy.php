<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::container()->resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorized($note['user_id'] === Session::get('id'));

$db->query('DELETE FROM notes WHERE id = ?', [$_POST['id']]);

header('Location: /notes');
exit();
