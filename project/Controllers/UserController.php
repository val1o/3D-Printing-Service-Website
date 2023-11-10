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
                    $user = new User();
                    $allUsers = $user->retrieveAllUsers();
                    $this->render("User", "viewAllUsers", $allUsers);
                    break;
                    
                case "login":
                    //Check if the username and password are set
                    if (isset($_POST['username']) && isset($_POST['password'])){
                        //Create user and assign info to variables
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $user = new User();

                        //Check if user info is correct
                        if($user->checkLoginUser($username, $password)){
                            
                            //Assign user and check if admin
                            $user = $user->getUserByUsername($username);
                            $_SESSION['uID'] = $user['uID'];

                            if($user['isAdmin']) {
                                $user = new User();
                                $allUsers = $user->retrieveAllUsers();
                                $this->render("User", "viewAllUsers", $allUsers);
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
                    break;
                
                case "register":
                    //Check if the info is set
                    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['telephoneNumber']) && isset($_POST['address']) && isset($_POST['postalCode']) && isset($_POST['username']) && isset($_POST['password'])){
                        
                        //Create user and assign info to variables
                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];
                        $telephoneNumber = $_POST['telephoneNumber'];
                        $address = $_POST['address'];
                        $postalCode = $_POST['postalCode'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $user = new User();

                        //Check if username already exists
                        if(!$user->getUserByUsername($username)){
                            
                            //Populate variable
                            $user = $user->addUser($firstName, $lastName, $telephoneNumber, $address, $postalCode, $username, $password);

                            //Check if info is valid
                            if($user){
                                echo "User registered successfully.";
                            } else {
                                echo "Registration error.";
                            }

                        } else {
                            echo "Username is already taken.";
                        }
                    } else {
                        $this->render("User", "register");
                    }
                    break;
            }
                    
            //         case 'register':
            //             include '../Views/register.php';
            //             if($_SERVER['REQUEST_METHOD'] === 'POST'){
                            // $firstName = $_POST['firstName'];
                            // $lastName = $_POST['lastName'];
                            // $telephoneNumber = $_POST['telephoneNumber'];
                            // $address = $_POST['address'];
                            // $postalCode = $_POST['postalCode'];
                            // $username = $_POST['username'];
                            // $password = $_POST['password'];
            //                 $result = user::addUser($firstName, $lastName, $telephoneNumber, $address, $postalCode, $username, $password);
                            // if($result){
                            //     echo "User registered successfully.";
                            // } else {
                            //     echo "Registration error.";
                            // }
            //             }
            //             break;
            //     }
            // }
        }
    }
?>