<?php
//Created by: Evandro Ramos
//Date: February 23, 2018
//Last modified: March 19, 2018 by Evandro Ramos

    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/lib/bcrypt.php";
    include_once $_SERVER['DOCUMENT_ROOT']. "/assets/class/dao/userDAO.php";
    include_once $_SERVER['DOCUMENT_ROOT']. "/assets/class/session.php";

    $session = new Session();

    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $pass = isset($_POST['pass']) ? $_POST['pass'] : null;

    // Check if the request method is post
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: login.html");
    }

    if ($pass != null && $login != null)  {
        try {
            $user = (new UserDAO())->login(new User($login, $pass));
            if ($user != NULL) {
                if (Bcrypt::check($pass, $user->getPass())) {
                    if($user->getActivated()) { //if user is not activated it will show invalid user
                        $session->loginUser($user);
                        if ($user->getType() == 2) {
                            echo '2';
                        } elseif ($user->getType() == 1) {
                            #professor page
                            echo '1';
                        } else {
                            echo '0';
                            #admin page
                        }
                    } else {
                        echo "User not active";
                    }
                } else {
                    echo "Invalid user or password";
                }
            } else {
                echo "Invalid user or password";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Please contact database admin";
//            echo $e->getMessage();
        }
    } else {
        echo "Fill in the requested fields correctly";
    }