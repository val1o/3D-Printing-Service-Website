<?php
//Include the connection file
include_once "../connection.php";

//Create user class
class User{
    //Create properties of a user object
    public $uID;
    public $firstName;
    public $lastName;
    public $telephoneNumber;
    public $address;
    public $postalCode;
    public $username;
    public $password;
    public $isAdmin;

    //Create the class constructor
    function __construct($uID = -1){
        //Call global $conn
        global $conn;

        //Set the uID to the uID provided
        $this->uID = $uID;

        //If the uID is invalid...
        if(uID < 0){
            $this->firstName = "";
            $this->lastName = "";
            $this->telephoneNumber = "";
            $this->address = "";
            $this->postalCode = "";
            $this->userName = "";
            $this->password = "";
            $this->isAdmin = "";
        } else {
            //If the user is valid...

            //Run an sql statement to retrieve the data for the user in the db
            $sql = "SELECT * FROM `users` WHERE `uID` =" . $uID;

            //Call the query feature of the conn using our statement
            $result = $conn->query($sql);

            //Format the data into an associative array
            $data = $result->fetch_assoc();

            //Populate the new object with our fetched data
            $this->firstName = $data['firstName'];
            $this->lastName = $data['lastName'];
            $this->telephoneNumber = $data['telephoneNumber'];
            $this->address = $data['address'];
            $this->postalCode = $data['postalCode'];
            $this->username = $data['username'];
            $this->password = $data['password'];
            $this->isAdmin = $data['isAdmin'];
        }
    }

    public static function retrieveAllUsers(){
        //Call global conn
        global $conn;

        //Create the sql statement to retrieve all users
        $sql = "SELECT * FROM `users`";

        //Run sql statement
        $result = $conn->query($sql);

        //if error...
        if(!$result){
            die("Error: " . $conn->error);
        }

        //Create empty array for the users
        $users = array();

        //Populate array with fetched data
        while($row = $result->fetch_assoc()){
            $users[] = $row;
        }

        //Return the array
        return $users;
    }


    public function deleteUser(){
        //Call global conn
        global $conn;

        //Create sql statement to delete the user
        $sql = "DELETE * FROM `users` WHERE uID=?";

        //Prepare the statement
        $stmt = $conn->prepare($sql);

        //Check if preparation was successful
        if(!$stmt){
            return "Prepare error: " . $conn->error;
        }

        //Bind parameters to the statement
        $stmt->bind_param("i", $this->uID);

        //Execute the statement
        if($stmt->execute()){
            return "User with ID: " . $this->uID . " deleted successfully";
        } else {
            return "Deletion error: " . $stmt->error;
        }
    }

    public function promoteUser(){
        //Call global conn
        global $conn;

        //Create sql statement to promote user to admin
        $sql = "UPDATE * FROM `users` SET isAdmin=?";

        //Bind parameters to sql stmt
        $stmt->bind_param("i", $this->isAdmin);

        //Execute stmt
        if($stmt->execute()){
            return "User with ID: " . $this->uID . "successfully promoted.";
        } else {
            return "Promotion error: " . $stmt->error;
        }
    }

    public function updateUser(){
        //Call global conn
        global $conn;

        //Create sql statement to update the user
        $sql = "UPDATE * FROM `users` SET firstName=?, lastName=?, telephoneNumber=?, address=?, postalCode=?, username=?, password=? WHERE uID=?";

        //Bind parameters to sql stmt
        $stmt->bind_param("sssssss", $this->firstName, $this->lastName, $this->telephoneNumber, $this->address, $this->postalCode, $this->username, $this->password);

        //Execute stmt
        if($stmt->execute()){
            return "User with ID: " . $this->uID . "updated successfully";
        } else {
            return "Update error: " . $stmt->error;
        }
    }

    public static function addUser(){
        //Call global conn
        global $conn;

        //Create sql statement to add a user
        $sql = "INSERT INTO `users` (firstName, lastName, telephoneNumber, address, postalCode, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)";

        //Prepare statement
        $stmt->prepare($sql);

        //Bind parameters to statement
        $stmt->bind_param("sssssssi", $_POST['firstName'], $_POST['lastName'], $_POST['telephoneNumber'], $_POST['address'], $_POST['postalCode'], $_POST['username'], $_POST['password']);

        //Execute statement
        return $stmt->execute();
    }

    public static function checkLoginUser($username, $password){
        //Call global conn
        global $conn;

        //Create sql statement to verify if user exists
        $sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";

        //Run sql statement
        $result = $conn->query($sql);

        //Check if result exists
        if($result->num_rows > 0){
            return true;
        } else {
            return false;
        }
    }



}
