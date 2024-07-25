<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    return view("registration/create.view.php", [
        'heading' => 'Login',
        'errors' => $form->getErrors()
    ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        exit();
    }
}

return view('session/create.view.php', ['errors' => ['password' => 'Wrong Email or Password'], 'heading' => 'Login']);
