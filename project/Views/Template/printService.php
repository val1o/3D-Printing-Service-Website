<?php $this->render("Shared", "header", ['css' => 'printService', "title" => "Print Service Page"]); ?>

<?php if (isset($template)) { ?>
        <!-- Step 3: Display the fetched details in HTML -->
        <div class="print-service-section">    
            <div class="template">
                <div class="image-container">
                    <img src="<?php echo $template['file'];?>" alt="Template Image">
                </div>

                <div class="text-container">
                    <p class="title"><?php echo "Title: " . $template['title']; ?></p>
                    <p class="description"><?php echo $template['description']; ?></p>
                    <label class="creator"><?php echo 'Creator ID: ' . $template['user_id']; ?></label>
                    
                    <form action="index.php?c=Template&a=sendToCheckout" method="post">
                        <input type="hidden" name="templateID" value="<?= $template['templateID']; ?>">
                        <input type="submit" value="Confirm Purchase">
                    </form>
                </div>
            </div>
            <div class="comments">
                <?php
                    if(!empty($comments)) {
                        //If there are comments under the template
                        foreach ($comments as $comment):
                            $author = $author->getUserByuID($comment['user_id']);
                ?>
                            <div class="comment">
                                <p class="author">Comment Author: <?= $author['username'] ?></p>
                                <p class="date-created">Comment Written On: <?= $comment['timeOfCreation'] ?></p>
                                <p class="header">Comment Header: <?= $comment['header'] ?></p>
                                <p class="body">Comment Body: <?= $comment['body'] ?></p>
                            </div>
                <?php
                        endforeach;
                    } else {
                        //If there are no comments yet ?>
                        <div class="no-comment">
                            <p>There are no comments yet!</p>
                        </div>
                <?php } ?>
            </div>
        </div>

<?php
    } else {
        // Handle the case when template details are not available
        echo "Template details not found.";
    }
?>

<?php $this->render("Shared", "footer"); ?>