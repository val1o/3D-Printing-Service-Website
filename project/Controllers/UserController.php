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
                        
                        //Assign info to variables
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        //Create user and check if info is correct
                        $user = new User();
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
                        
                        //Assign info to variables
                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];
                        $telephoneNumber = $_POST['telephoneNumber'];
                        $address = $_POST['address'];
                        $postalCode = $_POST['postalCode'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        //Create new user and check if username already exists
                        $user = new User();
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

                case "profile":
                    //Check if session is set
                    if(isset($_SESSION['uID'])) {
                        
                        //Assign info to variables
                        $uID = $_SESSION['uID'];

                        //Creating and populating new user
                        $user = new User();
                        $user = $user->getUserByuID($uID);
                        
                        //Render with user data
                        $this->render("User", "profile", ['user' => $user]);

                    } else {
                        $this->render("User", "profile");
                    }
                    break;

                case "updateProfile":
                    //Check if updateProfile is set
                    if(isset($_POST['update'])) {
                        
                        //Assign info to variables
                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];
                        $telephoneNumber = $_POST['telephoneNumber'];
                        $address = $_POST['address'];
                        $postalCode = $_POST['postalCode'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        //Create new user and update the info
                        $user = new User();
                        $user->updateUser($_SESSION['uID']);
                        
                        //Re-populate user
                        $user = $user->getUserByuID($_SESSION['uID']);

                        //Re-render the profile with updated values
                        $this->render("User", "profile", ['user' => $user]);
                        echo "User updated successfully!";

                    } else {
                        echo "pls do not probe the website";
                    }
                    break;

                case "logout":
                    //Destroy and unset session
                    session_unset();
                    session_destroy();
                    $this->render("Home", "home");
            }
        }
    }
?>