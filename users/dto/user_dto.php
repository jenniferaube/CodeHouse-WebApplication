<?php
/*
 * user_dto.php
 * Created by: Jennifer Aube
 * Date Created: April 03, 2018
 * Code modified from class_dto.php
 */
class user_dto{
    private $user_firstname;
    private $user_lastname;
    private $user_email;
    private $user_password;
    private $user_created;

    public function __construct(){
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    public function getUserFirstname(){
        return $this->user_firstname;
    }
    public function setUserFirstname($user_firstname){
        $this->user_firstname = $user_firstname;
    }
    public function getUserLastname(){
        return $this->user_lastname;
    }
    public function setUserLastname($user_lastname){
        $this->user_lastname = $user_lastname;
    }
    public function getUserEmail(){
        return $this->user_email;
    }
    public function setUserEmail($user_email){
        $this->user_email = $user_email;
    }
    public function getUserPassword(){
        return $this->user_password;
    }
    public function setUserPassword($user_password){
        $this->user_password = $user_password;
    }
    public function getUserCreated(){
        return $this->user_created;
    }
    public function setUserCreated($user_created){
        $this->user_created = $user_created;
    }
    public function getUserActive(){
        return $this->user_active;
    }
    public function setUserActive($user_active){
        $this->user_active = $user_active;
    }
    public function getUserType(){
        return $this->user_type;
    }
    public function setUserType($user_type){
        $this->user_type = $user_type;
    }
}
?>
