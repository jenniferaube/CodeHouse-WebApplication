<?php

class User {

    private $id;
    private $name;
    private $login;
    private $pass;
    
    function __construct(string $login, string $pass) {
        $this->login = $login;
        $this->pass = $pass;
        $this->id = NULL;
        $this->name = NULL;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function toString() {
        return $this->login." - ".$this->pass;
    }

}

?>