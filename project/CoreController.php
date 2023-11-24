<?php

    class CoreController {

        public function render($viewGroup, $view, $data = []) {
            extract($data);

            include "Views/$viewGroup/$view.php";
        }
    }

?>