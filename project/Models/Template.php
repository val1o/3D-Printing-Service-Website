<?php
//Include the connection file
include_once "CoreModel.php";

class Template{
    public $templateID;
    public $file;
    public $creationDate;
    public $theme;
    public $title;
    public $description;
    public $user_id;

    function __construct($templateID = -1){
        global $conn;

        $this->templateID = $templateID;

        if($templateID < 0){
            $this->file = "";
            $this->creationDate = "";
            $this->theme = "";
            $this->title = "";
            $this->description = "";
            $this->user_id = "";
        } else {
            
            $sql = "SELECT * FROM `templates` WHERE `templateID` =" . $templateID;

            $result = $conn->query($sql);

            $data = $result->fetch_assoc();

            $this->file = $data['file'];
            $this->creationDate = $data['creationDate'];
            $this->theme = $data['theme'];
            $this->title = $data['title'];
            $this->description = $data['description'];
            $this->user_id = $data['user_id'];
        }
    }


    // public static function createTemplate($file, $creationDate, $theme, $title, $description, $user_id){
    //     global $conn;

    //     $sql = "INSERT INTO `templates` (file, creationDate, theme, title, description, user_id) VALUES (?, ?, ?, ?, ?, ?)";

    //     $stmt = $conn->prepare($sql);

    //     $stmt->bind_param("sssssi", $file, $creationDate, $theme, $title, $description, $user_id);

    //     if($stmt->execute()){
    //         echo "Addition successful";
    //     } else {
    //         echo "Error: " . $stmt->error;
    //     }
    // }

    public static function createTemplate($file, $creationDate, $theme, $title, $description, $user_id){
        echo "File: $file </br> Creation Date: $creationDate </br> Theme: $theme </br> Title: $title </br> Description: $description </br> UID: $user_id";
    }

    public static function deleteTemplate($templateID){
        global $conn;

        $sql = "DELETE FROM `templates` WHERE templateID=?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("i", $templateID);

        if($stmt->execute()){
            echo "Deletion successful";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    public static function getTemplate($templateID){
        global $conn;

        $sql = "SELECT * FROM `templates` WHERE templateID=$templateID";

        $result = $conn->query($sql);

        return $result->fetch_assoc();
    }

    public static function getTemplateTags($templateID){
        global $conn;

        $sql = "SELECT `theme` FROM `templates` WHERE templateID=$templateID";

        $result = $conn->query($sql);

        $tags = array();

        while($row = $result->fetch_assoc()){
            $tags[] = $row['tag'];
        }

        return $tags;
    }
    
    public static function displayMyTemplates($user_id){
        global $conn;

        $sql = "SELECT * FROM `templates` WHERE user_id=?";
        
        $result = $conn->query($sql);

        return $result->fetch_assoc();

        
    }

    public static function displayAllTemplates(){
        global $conn;

        $sql = "SELECT * FROM `templates`";

        $result = $conn->query($sql);

        $templates = array();

        while($row = $result->fetch_assoc()){
            $templates[] = $row;
        }

        return $templates;
    }

}
?>