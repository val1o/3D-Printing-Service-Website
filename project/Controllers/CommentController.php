<?php
    include_once 'CoreModel.php';
    include_once 'CoreController.php';
    include_once 'Models/User.php';

    class CommentController extends CoreController {

        function route(){

            $action = (isset($_GET['a']) ? $_GET['a'] : "default");

            switch($action) {
                case "createComment":
                    $this->createComment();
                    break;

                case "deleteComment":
                    $this->deleteComment();
                    break;

                case "viewAllCommentsForPost":
                    $this->viewAllCommentsForPost();
                    break;

                case "default":
                    $this->render("Templates", "printService");
                    break;
            }
        }

        private function viewAllCommentsForPost(){
            //Temporary
            $template_id = $_SESSION['template_id'];

            $comment = new Comment();
            $allComments = $comment->getAllCommentsForATemplate($template_id);
            $this->render("Template", "printService", $allComments);
        }

        private function createComment(){
            if (isset($_POST['header']) && isset($_POST['body']) &&
                isset($_POST['user_id']) && isset($_POST['template_id'])){

                $timeOfCreation = date('Y-m-d H:i:s');
                $header = $_POST['header'];
                $body = $_POST['body'];
                $user_id = $_SESSION['uID'];
                $template_id = $_POST['template_id'];

                $comment = new Comment();
                $comment = $comment->createComment($timeOfCreation, $header, $body, $user_id, $template_id);

                if($comment){
                    echo "Comment created successfully.";
                } else {
                    echo "Creation error.";
                }
            } else {
                $this->render("Template", "printService");
            }
        }

        private function deleteComment(){
            if(isset($_POST['delete'])){

                $comment = new Comment();
                $comment->deleteComment($_POST['commentID']);

                $this->render("Template", "printService");
                echo "Comment deleted";
            } else {
                echo "pls do not probe the website";
            }
        }




    }



?>