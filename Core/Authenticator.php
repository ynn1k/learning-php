<?php

namespace Core;

class Authenticator
{
    /**
     * @param $email
     * @param $password
     * @return boolean
     */
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    /**
     * @param $user
     * @return void
     */
    public function login($user)
    {
        $_SESSION['user'] = $user;

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}