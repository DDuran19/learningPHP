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
            $this->error(['email' => 'Please enter a valid email']);
        }

        if (isset($password) && !FormValidator::string($password, 7, 50)) {
            $this->error(['password' => 'Please enter a valid password (7-50 characters)']);
        }

        return !empty($this->errors);
    }

    public function error(array $errors)
    {
        foreach ($errors as $key => $message) {
            $this->errors[$key] = $message;
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
