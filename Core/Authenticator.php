<?php

namespace Core;

class Authenticator
{
    /**
     * @param $email
     * @param $password
     * @return void
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
        $_SESSION = [];
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        session_destroy();
    }
}