<?php
//Include the connection file
include_once "CoreModel.php";

class Report{
    public $reportID;
    public $status;
    public $header;
    public $body;
    public $comment_id;
    public $user_id;

    function __construct($reportID = -1){
        global $conn;

        $this->reportID = $reportID;

        if($reportID < 0){
            $this->status = "";
            $this->header = "";
            $this->body = "";
            $this->comment_id = "";
            $this->user_id = "";
        } else {
            
            $sql = "SELECT * FROM `reports` WHERE `reportID` =" . $reportID;

            $result = $conn->query($sql);

            $data = $result->fetch_assoc();

            $this->status = $data['status'];
            $this->header = $data['header'];
            $this->body = $data['body'];
            $this->comment_id = $data['comment_id'];
            $this->$user_id = $data['user_id'];
        }
    }

    public static function createReport(){
        global $conn;

        $sql = "INSERT INTO `reports` (status, header, body, comment_id, user_id) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sssii", $_POST['status'], $_POST['header'], $_POST['body'], $_POST['template_id'], $_POST['user_id']);

        if($stmt->execute()){
            echo "Addition successful";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    public static function deleteReport($reportID){
        global $conn;

        $sql = "DELETE FROM `reports` WHERE reportID=?";

        $stmt = $conn->prepare();

        $stmt->bind_param("i", $reportID);

        if($stmt->execute()){
            echo "Deletion successful";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    public static function updateReport($reportID){
        global $conn;

        $sql = "UPDATE `reports` SET status=? WHERE reportID=$reportID";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $_POST['status']);

        if($stmt->execute()){
            return "Report updated";
        } else {
            return "Update error: " . $stmt->error;
        }
    }

    public static function getAllReports(){
        global $conn;

        $sql = "SELECT * FROM `reports`";

        $result = $conn->query($sql);

        $reports = array();

        while($row = $result->fetch_assoc()){
            $reports[] = $row;
        }

        return $reports;

    }


}