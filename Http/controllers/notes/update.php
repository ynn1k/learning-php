<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::container()->resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorized($note['user_id'] === Session::get('id'));

$errors = [];

if (!Validator::string($_POST['text'])) {
    $errors['text'] = "Note text must be between 8 to 255 characters.";
}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET text = :text WHERE id = :id', [
    'id' => $_POST['id'],
    'text' => $_POST['text']
]);

redirect('/notes');