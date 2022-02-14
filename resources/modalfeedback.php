<div class="modal" id="<?php echo $ucnt?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Give Feedback to <?php echo pntname($row['userId']) ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="feedback"></label>
                        <input type="hidden" name="us_id" value="<?php echo $row['userId'] ?>">
                        <input type="hidden" name="appnt_id" value="<?php echo $row['id'] ?>">
                        <textarea id="feedback" name="feedback" class="form-control" required placeholder="Feedback..."></textarea>
                    </div>
                    <button class="btn btn-primary" name="feed" type="submit">Send</button>

                </form>
            </div>



        </div>
    </div>
</div>