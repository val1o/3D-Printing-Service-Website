<?php
    include_once 'CoreModel.php';
    include_once 'CoreController.php';
    include_once 'Models/User.php';

    class ReportController extends CoreController {

        function route(){

            $action = (isset($_GET['a']) ? $_GET['a'] : "default");

            switch($action) {
                case "createReport":
                    $this->createReport();
                    break;

                case "deleteReport":
                    $this->deleteReport();
                    break;

                case "viewAllReports":
                    $report = new Report();
                    $allReports = $report->getAllReports();
                    $this->render("User", "systemManager");
                    break;

                case "default":
                    $this->render("Home", "Home");
                    break;
            }
        }

        private function createReport(){
            if (isset($_POST['status']) && isset($_POST['header']) && isset($_POST['body']) &&
                isset($_POST['user_id']) && isset($_POST['comment_id'])){

                $status = $_POST['status'];
                $header = $_POST['header'];
                $body = $_POST['body'];
                $user_id = $SESSION['uID'];
                $comment_id = $_POST['comment_id'];

                $report = new Report();
                $report = $report->createReport($status, $header, $body, $user_id, $comment_id);

                if($report){
                    echo "report created successfully.";
                } else {
                    echo "Creation error.";
                }
            } else {
                $this->render("Home", "home");
            }
        }

        private function deleteReport(){
            if(isset($_POST['delete'])){

                $report = new Report();
                $report->deleteReport($_POST['reportID']);

                $this->render("User", "systemManager");
                echo "Report deleted";
            } else {
                echo "pls do not probe the website";
            }
        }

        private function updateReport(){
            if(isset($_POST['update'])){

                $status = $_POST['status'];

                // switch($status){
                //     case "Pending":
                //         $this->render("User", "systemManager");
                //         break;
                    
                //     case "Approved":
                //         $this->render()
                // }

                $report = new Report();
                $report->updateReport($_POST['reportID']);

                $this->render("User", "systemManager");
                echo "Report updated successfully";

            } else {
                echo "pls do not probe the website";
            }
        }

        




    }



?>