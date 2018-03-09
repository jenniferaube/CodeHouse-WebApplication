<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/user.php";

Class Session {

    function  __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function destroy() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            $_SESSION = array();

            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], 
                    $params["domain"],
                    $params["secure"], 
                    $params["httponly"]
                );
            } 
            
            session_destroy();
        }
    }

    public function blockPage() {
        if (!isset($_SESSION['userId']) || !isset($_SESSION['userfName']) || !isset($_SESSION['userlName']) || !isset($_SESSION['userLogin']) || !isset($_SESSION['userType'])) {
            header("Location: /index.php");
        }
    }

    public function blockStudent() {
        if ($_SESSION['userType'] == 2) {
            header("Location: /student.php");
        }
    }
    public function blockAdmin() {
        if ($_SESSION['userType'] == 0) {
            header("Location: /admin.php");
        }
    }
    public function blockProfessor() {
        if ($_SESSION['userType'] == 1) {
            header("Location: /professor.php");
        }
    }

    public function loginUser(User $u) {
        if (session_status() == PHP_SESSION_ACTIVE) {
            $_SESSION['userId'] = $u->getId();
            $_SESSION['userfName'] = $u->getfName();
            $_SESSION['userlName'] = $u->getlName();
            $_SESSION['userLogin'] = $u->getLogin();
            $_SESSION['userType'] = $u->getType();
        } else {
            echo 'Unable to login!';
        }
    }

    public function logoutUser() {
        if ($this->isLogged()) {
            if (isset($_GET['logout'])) {
                $this->destroy();
                header("Location: ".$_GET['logout'].".php");
            }
        }
    }




    public function isLogged() {
        return isset($_SESSION['userId']) && isset($_SESSION['userfName']) && isset($_SESSION['userlName']) && isset($_SESSION['userLogin']) && isset($_SESSION['userType']);
    }


    public function blockReLoggin() {
        if ($this->isLogged()) {
            if ($_SESSION['userType'] == 2) {
                header("Location: /student.php");
            } elseif ($_SESSION['userType'] == 1) {
                #professor page
                header("Location: /professor.php");
            } else {
                #admin page
                header("Location: /");
            }

        }
    }

}

?>