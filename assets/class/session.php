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
            header("Location: /");
        }
    }

    public function blockPage() {
        if (!isset($_SESSION['userId']) || !isset($_SESSION['userName']) || !isset($_SESSION['userLogin']) || !isset($_SESSION['userPass'])) {
            header("Location: /");
        }
    }

    public function loginUser(User $u) {
        if (session_status() == PHP_SESSION_ACTIVE) {
            $_SESSION['userId'] = $u->getId();
            $_SESSION['userfName'] = $u->getfName();
            $_SESSION['userlName'] = $u->getlName();
            $_SESSION['userLogin'] = $u->getLogin();
            $_SESSION['userPass'] = $u->getPass();
        } else {
            echo 'Unable to login!';
        }
    }

    public function logoutUser() {
        if (isset($_GET['logout'])) {
            $this->destroy();
        }
    }

    public function isUserLogged() {
        if (isset($_SESSION['userId']) && isset($_SESSION['userName']) && isset($_SESSION['userLogin']) && isset($_SESSION['userPass'])) {
            header("Location: /home");
        }
    }

}

?>