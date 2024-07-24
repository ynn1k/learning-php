<?php

use Core\App;
use Core\Database;
use Core\Validator;

//TODO: fix warning - undefined variable $heading after failed login

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Invalid Email';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Invalid Password';
}

if (!empty($errors)) {
    return view('session/create.view.php', ['errors' => $errors]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        exit();
    }
}

return view('session/create.view.php', ['errors' => ['password' => 'Wrong Email or Password']]);
