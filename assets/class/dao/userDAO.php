<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/user.php";
include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/sql/connection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/lib/bcrypt.php";

class UserDAO {
    
    public function insert(User $u) {
        $query = 'INSERT INTO "user"(login, pass) VALUES (?, ?)';

        $conn = Connection::getConnection();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, $u->getLogin(), PDO::PARAM_STR);
        $stmt->bindValue(2, $u->getPass(), PDO::PARAM_STR);

        $stmt->execute();

        Connection::closeConnection($conn);

        //$this->pdo->lastInsertId('stocks_id_seq'); Return last id of seq
    }

    public function login(User $u) {
        $query = 'SELECT id, name, pass FROM "user" WHERE login~*?';

        $conn = Connection::getConnection();

        $stmt = $conn->prepare($query);
        $stmt->bindValue(1, $u->getLogin(), PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            $u->setId($row->id);
            $u->setPass($row->pass);
            $u->setName($row->name);

            Connection::closeConnection($conn);
            return $u;
        } else {
            Connection::closeConnection($conn);
            return NULL;
        }
        
    }

}

?>