<?php

namespace Models;

class UserManage {
    private $users = array();
    private RegisterErrors $errors;
    private User $user;
    private bool $edit;
   
    public function setUsers(array $users){
        $this->users = $users;
    }

    public function getUsers(){
        return $this->users;
    }

    public function setErrors(registerErrors $errors){
        $this->errors = $errors;
    }

    public function getErrors(){
        return $this->errors;
    }

    public function setUser(User $user){
        $this->user = $user;
    }

    public function getUser(){
        return $this->user;
    }

    public function setEdit(bool $edit){
        $this->edit = $edit;
    }

    public function getEdit(){
        return $this->edit;
    }

}