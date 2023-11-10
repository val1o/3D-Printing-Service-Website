<?php
    //Include ressources
    include_once 'connection.php';
    include_once 'Models/User.php';

    class UserController {

        public function render($view, $data = []) {
            extract($data);

            include "Views/User/$view.php";
        }

        public function route() {

            $action = (isset($_GET['action'])) ? $_GET['action'] : "viewAllUsers";
		    $id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;

            
            switch ($action) {
                case "viewAllUsers":
                    $allUsers = User::retrieveAllUsers();
                    $this->render("viewAllUsers", $allUsers);
                    break;
                case "login":
                    //Check if the username and password are set
                    if (isset($_POST['username']) && isset($_POST['password'])){
                        //Put them in vars if yes
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        //Check if username and password are valid
                        if(User::checkLoginUser($username, $password)){
                            $this->render("login");    
                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("Please enter a valid username and password.")';
                            echo '</script>';
                        }
                    } else {
                        $this->render("login");
                    }
            }
                    
            //         case 'register':
            //             include '../Views/register.php';
            //             if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //                 $firstName = $_POST['firstName'];
            //                 $lastName = $_POST['lastName'];
            //                 $telephoneNumber = $_POST['telephoneNumber'];
            //                 $address = $_POST['address'];
            //                 $postalCode = $_POST['postalCode'];
            //                 $username = $_POST['username'];
            //                 $password = $_POST['password'];
            //                 $result = user::addUser($firstName, $lastName, $telephoneNumber, $address, $postalCode, $username, $password);
            //                 if($result){
            //                     echo "User registered successfully.";
            //                 } else {
            //                     echo "Registration error.";
            //                 }
            //             }
            //             break;
            //     }
            // }
        }
    }
?>