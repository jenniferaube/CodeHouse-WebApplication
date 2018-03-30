<!--File: style-footer.css-->
<!--Created by: Evandro Ramos-->
<!--Date: February 23, 2018-->
<!--Last modified: March 19, 2018 by Evandro Ramos-->
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
        $query = 'SELECT id, first_name, last_name, email, password, activated, type FROM user WHERE LOWER(email) = LOWER(?);';

        $conn = Connection::getConnection();

        $stmt = $conn->prepare($query);
        $login = $u->getLogin();
        $stmt->bind_param("s", $login);

        /* execute query */
        $stmt->execute();

        /* store result */
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $fname, $lname, $email, $pass, $activated, $type);
            $stmt->fetch();

            $u->setId($id);
            $u->setfName($fname);
            $u->setlName($lname);
            $u->setLogin($email);
            $u->setPass($pass);
            $u->setActivated($activated);
            $u->setType($type);

            $stmt->close();
            Connection::closeConnection($conn);
            return $u;
        } else {
            Connection::closeConnection($conn);
            return $stmt->errno;
        }

    }

}

?>