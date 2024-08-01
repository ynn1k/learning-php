<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Invalid Email';
}

if (!Validator::string($password,8, 255)) {
    $errors['password'] = 'Invalid Password (min. 8 characters)';
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        'heading' => 'Register',
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

if (!$user) {
    $db->query('INSERT INTO users (email, name, password) VALUES (:email, :name, :password)', [
        'email' => $email,
        'name' => $name,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $newUser = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

    (new Authenticator)->login($newUser);
}

redirect('/');
