<?php

use Core\App;
use Core\Database;

$db = App::container()->resolve(Database::class);

$currentUserId = 1;

$notes = $db->query("SELECT * FROM notes WHERE user_id = {$currentUserId}")->get();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);
