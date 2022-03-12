<?php

namespace Models;

class registerErrors
{
    private string $emailError;
    private string $passwordError;
    private string $usernameError;
    private bool $success;

    function __construct()
    {
        $this->emailError = "";
        $this->passwordError = "";
        $this->usernameError = "";
    }

    public function setEmailErr(string $emailError)
    {
        $this->emailError = $emailError;
    }

    public function getEmailErr()
    {
        return $this->emailError;
    }

    public function setPasswordErr(string $passwordError)
    {
        $this->passwordError = $passwordError;
    }

    public function getPasswordErr()
    {
        return $this->passwordError;
    }

    public function setUsernameErr(string $usernameError)
    {
        $this->usernameError = $usernameError;
    }

    public function getUsernameErr()
    {
        return $this->usernameError;
    }

    public function setSuccess(bool $success)
    {
        $this->success = $success;
    }

    public function getSuccess()
    {
        return $this->success;
    }
}
