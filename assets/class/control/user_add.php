
<!--File: style-footer.css-->
<!--Created by: Evandro Ramos-->
<!--Date: February 23, 2018-->
<!--Last modified: March 19, 2018 by Evandro Ramos-->

<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/lib/bcrypt.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/dao/userDAO.php";

    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $pass = isset($_POST['pass']) ? $_POST['pass'] : null;

    if ($pass != null && $login != null)  {
        $pass = Bcrypt::hash($pass);
        if (strlen($pass) == 60) {
            // Inserting in the DB
            try {
                (new UserDAO())->insert(new User($login, $pass));
                echo "Cadastro efetuado com sucesso!";
            } catch (PDOException $e) {
                if ($e->getCode() === "23505") {
                    echo "Este nome já está em uso!";
                } else {
                    echo $e->getMessage();
                }
            }
        } else {
            echo "ERRO - Senha inválida!";
        }
    } else {
        echo "ERRO - Campos inválidos!";
    }
?>