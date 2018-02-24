<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/lib/bcrypt.php";
    include_once $_SERVER['DOCUMENT_ROOT']. "/assets/class/dao/userDAO.php";
    include_once $_SERVER['DOCUMENT_ROOT']. "/assets/class/session.php";

    $session = new Session();

    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $pass = isset($_POST['pass']) ? $_POST['pass'] : null;

    // Check if the request method is post
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: /");
    }

    if ($pass != null && $login != null)  {
        try { 
            $user = (new UserDAO())->login(new User($login, $pass));
            if ($user != NULL) {
                if (Bcrypt::check($pass, $user->getPass())) {
                    $session->loginUser($user);
                    echo '1';
                } else {
                    echo "Usuário ou senha inválido!";
                }
            } else {
                echo "Usuário ou senha inválido!";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        echo "Preencha corretamente os campos solicitados!";
    }
?>