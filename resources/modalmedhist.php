<div class="modal" id="medical">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><?php echo pntname($_GET['profile']) ?>'s Medical History</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th class="">Medical Hist.</th>
                        <th>Medication Hist.</th>
                        <th>Family Medical Hist.</th>
                        <th>Treatment Hist</th>



                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while($row=mysqli_fetch_array($medhis))
                    {
                        ?>

                        <tr>
                            <td class="center"><?php echo $cnt;?>.</td>

                            <td><?php echo $row['pnt_med_hist'];?></td>
                            <td><?php echo $row['medication_hist']?></td>
                            <td><?php  echo $row['family_med_hist']?></td>
                            <td><?php echo $row['treatment_hist'];?></td>

                        </tr>

                        <?php
                        $cnt=$cnt+1;
                    }?>


                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>