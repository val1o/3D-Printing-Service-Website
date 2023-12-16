<?php
    include_once 'CoreModel.php';
    include_once 'CoreController.php';
    include_once 'Models/User.php';
    include_once 'Models/Comment.php';
    include_once 'Models/Template.php';

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
            if (!empty($_POST['header']) && !empty($_POST['body']) &&
                !empty($_POST['user_id']) && !empty($_POST['templateID'])){

                $header = $_POST['header'];
                $body = $_POST['body'];
                $user_id = $_SESSION['uID'];
                $template_id = $_POST['templateID'];

                $comment = new Comment();
                $comment->createComment($header, $body, $user_id, $template_id);

                //Sending back the template that needs to be loaded
                $template = new Template();
                $template = $template->getTemplate($template_id);

                //Also sending back the comments that need to be loaded
                $comments = new Comment();
                $comments = $comments->getAllCommentsForATemplate($template_id);

                //Also send an empty User for the printService view to use
                $user = new User();

                $this->render("Template", "printService", ['template' => $template, 'comments' => $comments, 'user' => $user]);

            } else {
                $this->render("Template", "printService", ['error' => 'Please enter all of the information']);
            }
        }

        private function deleteComment(){
            if(isset($_POST['delete'])){

                $comment = new Comment();
                $comment->deleteComment($_POST['commentID']);

                //Sending back the template that needs to be loaded
                $template = new Template();
                $template = $template->getTemplate($_POST['templateID']);

                //Also sending back the comments that need to be loaded
                $comments = new Comment();
                $comments = $comments->getAllCommentsForATemplate($_POST['templateID']);

                //Also send an empty User for the printService view to use
                $user = new User();
                
                $this->render("Template", "printService", ['template' => $template, 'comments' => $comments, 'user' => $user]);
                echo "Comment deleted";
            } else {
                echo "pls do not probe the website";
            }
        }




    }



?>