<?php

use Core\App;
use Core\Session;
use Core\Validator;
use Core\Database;

$db = App::container()->resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['text'])) {
    $errors['text'] = "Note text must be between 8 to 255 characters.";
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'New Note',
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO notes (text, user_id) VALUES (:text, :user_id)", [
    "text" => htmlspecialchars($_POST["text"]),
    "user_id" => Session::get('id')
]);

redirect('/notes');
