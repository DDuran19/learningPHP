<?php

namespace http\forms;

use Core\Errors\ValidationException;
use Core\FormValidator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        $email = $attributes['email'];
        $password = $attributes['password'];

        if (isset($email) && !FormValidator::email($email)) {
            $this->error(['email' => 'Please enter a valid email']);
        }

        if (isset($password) && !FormValidator::string($password, 7, 50)) {
            $this->error(['password' => 'Please enter a valid password (7-50 characters)']);
        }
    }
    public static function validate(array $attributes)
    {
        $instance = new static($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }
    public function error(array $errors)
    {
        foreach ($errors as $key => $message) {
            $this->errors[$key] = $message;
        }
        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
