<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$auth = new Authenticator();
$signedIn = $auth->attempt($attributes['email'], $attributes['password']);

if (!$signedIn) {
    $form->error('email', 'Wrong Email or Password')->throw();
} else {
    redirect('/');
}
