<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::container()->resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorized($note['user_id'] === Session::get('id'));

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);
