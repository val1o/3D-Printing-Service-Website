<?php
    //Include ressources
    include_once 'connection.php';
    include_once 'Models/User.php';

    class HomeController {

        public function render($view, $data = []) {
            extract($data);

            include "Views/Home/$view.php";
        }

        public function route() {

            $action = (isset($_GET['action'])) ? $_GET['action'] : "home";
		    $id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;

            $this->render("home");
        }
    }
?>