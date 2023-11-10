<?php
    //Include ressources
    include_once 'connection.php';
    include_once 'Models/User.php';

    class UserController {

        public function render($viewGroup, $view, $data = []) {
            extract($data);

            include "Views/$viewGroup/$view.php";
        }

        public function route() {

            $action = (isset($_GET['a'])) ? $_GET['a'] : "viewAllUsers";
            
            switch ($action) {
                case "viewAllUsers":
                    $allUsers = User::retrieveAllUsers();
                    $this->render("User", "viewAllUsers", $allUsers);
                    break;
                    
                case "login":
                    //Check if the username and password are set
                    if (isset($_POST['username']) && isset($_POST['password'])){
                        //Create user and add info
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $user = new User();

                        //Check if user exists
                        if($user->getUserByUsername($username)){
                            
                            //Assign user and check if admin
                            $user = $user->getUserByUsername($username);
                            $_SESSION['uID'] = $user['uID'];

                            if($user['isAdmin']) {
                                $this->render("User", "viewAllUsers");
                            } else {
                                $this->render("Home", "home");
                            }
                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("Please enter a valid username and password.")';
                            echo '</script>';
                        }
                    } else {
                        $this->render("User", "login");
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