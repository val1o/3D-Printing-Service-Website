<?php
    //Include ressources
    include_once '../connection.php';
    include_once '../Models/user.php';

    //Check if the action is set in the URL
    if(isset($_GET['action'])){
        //If yes put it in a var
        $action = $_GET['action'];

        //Switch $action
        switch($action){
            case 'viewAllUsers':
                $users = user::retrieveAllUsers();
                include '../Views/viewAllUsers.php';
                break;
            
            case 'register':
                include '../Views/register.php';
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $telephoneNumber = $_POST['telephoneNumber'];
                    $address = $_POST['address'];
                    $postalCode = $_POST['postalCode'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $result = user::addUser($firstName, $lastName, $telephoneNumber, $address, $postalCode, $username, $password);
                    if($result){
                        echo "User registered successfully.";
                    } else {
                        echo "Registration error.";
                    }
                }
                break;
        }
    }
?>