<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Invalid Email';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Invalid Password';
        }

        return empty($this->errors);
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}