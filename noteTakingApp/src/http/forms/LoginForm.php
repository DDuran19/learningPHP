<?php

namespace http\forms;

use Core\FormValidator;

class LoginForm
{
    protected $errors = [];
    public function validate(array $attributes)
    {
        $email = $attributes['email'];
        $password = $attributes['password'];

        if (isset($email) && !FormValidator::email($email)) {
            $errors['email'] = 'Please enter a valid email';
        }

        if (isset($password) && !FormValidator::string($password, 7, 50)) {
            $errors['password'] = 'Please enter a valid password (7-50 characters)';
        }

        return !empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
