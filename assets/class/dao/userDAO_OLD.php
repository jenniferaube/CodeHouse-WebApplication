        <?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/_class/user.php";
include_once $_SERVER['DOCUMENT_ROOT']."/_class/connection.php";

class UserDAO {
    
    public function insert(User $u) {
        $conn = Connection::getConnection();

        $query = 'INSERT INTO "user"(login, pass) VALUES ($1, $2)';
        pg_prepare($conn, "insert_user", $query);
        $result = pg_execute($conn, "insert_user", array($u->getLogin(), $u->getPass()));

        if ($result === FALSE) {
            echo pg_last_error($conn);
            //echo "Não foi possível efetuar o cadastro!";
        } else {
            echo "Cadastrado com sucesso!";
        }

        Connection::closeConnection($conn);
        
        return $result;
    }

}

?>