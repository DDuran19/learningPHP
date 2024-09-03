<?php

namespace Core;

class Authenticator
{
    protected $errors = [];
    protected $user;

    public function attempt(Database $db, array $attributes, callable $loginCallback)
    {
        $email = $attributes['email'];
        $password = $attributes['password'];

        $this->user = $db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email,
        ])->fetch();

        if (!$this->user) {
            $this->errors['email'] = 'Invalid email';
        } elseif (!password_verify($password, $this->user['password'])) {
            $this->errors['password'] = 'Invalid password';
        } else {
            if ($this->login()) {
                call_user_func($loginCallback);
                return true;
            };
            $this->errors['message'] = 'Something went wrong, please try again';
        }
        return false;
    }
    public function getErrors()
    {
        return $this->errors;
    }
    public function login()
    {
        if (!$this->user) {
            return false;
        }
        $_SESSION['user'] = $this->user['id'];
        $_SESSION['userDetails'] = [
            'name' => $this->user['name'],
            'email' => $this->user['email'],
        ];

        session_regenerate_id(true);
        return true;
    }
    public static function logout()
    {
        Session::flush();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie("PHPSESSID", '', time() - 60, $params['path'], $params['domain'], $params['secure'], $params['httponly'],);
    }
}
