<?php
/*
 * user_dao.php
 * Created by: Jennifer Aube
 * Date Created: April 03, 2018
 * Code modified from class_dao.php
 */
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/sql/connection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/users/dto/user_dto.php";
class user_dao
{
    public function insert_users($user)
    {
        $user_first_name = $user->getUserFirstname();
        $user_last_name = $user->getUserLastname();
        $user_email = $user->getUserEmail();
        $user_password = $user->getUserPassword();
        $user_created = $user->getUserCreated();
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('insert into user(first_name, last_name, email, password, created) values (?, ?, ?, ?, ?)');
        $stmt->bind_param("ssssi", $user_first_name, $user_last_name, $user_email, $user_password, $user_created);
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }
}