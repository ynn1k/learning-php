<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::container()->resolve(Database::class);

$currentUserId = Session::get('id');

$notes = $db->query("SELECT * FROM notes WHERE user_id = {$currentUserId}")->get();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);
