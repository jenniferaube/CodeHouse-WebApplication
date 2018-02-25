<?php

class User {

    private $id;
    private $fname;
    private $lname;
    private $login;
    private $pass;
    private $type;
    
    function __construct(string $login, string $pass) {
        $this->login = $login;
        $this->pass = $pass;
        $this->id = NULL;
        $this->type = NULL;
        $this->fname = NULL;
        $this->lname = NULL;
    }

    public function getId() {
        return $this->id;
    }

    public function getType() {
        return $this->type;
    }

    public function getfName() {
        return $this->fname;
    }

    public function getlName() {
        return $this->lname;
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
    public function setType($type) {
        $this->type = $type;
    }

    public function setfName($name) {
        $this->fname = $name;
    }

    public function setlName($name) {
        $this->lname = $name;
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