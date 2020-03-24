<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div style="float:left;overflow-y:auto;height:100%;">
    <div>
        <h4>Requests</h4>
        <table>
            <tr>
                <th>Request ID</th>
                <th>Request Type</th>
                <th>Reason</th>
                <th>Submit Remarks</th>
                <th>Date Submitted</th>
                <th>Name</th>
                <th>Admission number</th>
                <th>Advisor Remarks</th>
                <th>HOD Remarks</th>
                <th>Status/Action</th>


            </tr>
            <?php if ($myrequests) {

                foreach ($myrequests as $myrequest) {

            ?>
                    <tr>
                        <td><?= $myrequest->request_id; ?></td>
                        <td><?= $myrequest->type; ?></td>
                        <td><?= $myrequest->reason; ?></td>
                        <td><?= $myrequest->remarks; ?></td>
                        <td><?= $myrequest->submit_date; ?></td>
                        <td><?= $myrequest->name; ?></td>
                        <td><?= $myrequest->admission_no; ?></td>
                        <td><?php if ($myrequest->advisor == 0) {
                                if ($_SESSION['role'] == 'advisor') { ?></td>
                        <td> <a href="<?php echo base_url() . "index.php/staff/approve/" . $myrequest->request_id; ?>">Verify</a></td>
                    <?php } else { ?></td><td></td>
                        <td>Verification pending by Advisor</td><?php

                                                            }
                                                        } elseif ($_SESSION['role'] == 'hod' && $myrequest->advisor == 1 && $myrequest->hod == 0) {
                                                            echo $myrequest->a_remarks; ?></td>
                    <td></td>
                    <td> <a href="<?php echo base_url() . "index.php/staff/approve/" . $myrequest->request_id; ?>">Verify</a></td>
                <?php } else {
                                                            echo $myrequest->a_remarks . '</td><td>' . $myrequest->h_remarks . '</td><td>Verified';
                                                        } ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
    <div>
        <h4>Documents</h4>
        <table>
            <tr>
                <th>Document ID</th>
                <th>Document Type</th>
                <th>Owner Admission Number</th>
                <th>Owner Name</th>
                <th>Remarks</th>
                <th>Status</th>

            </tr>
            <?php if ($mydocs) {

                foreach ($mydocs as $mydoc) {

            ?>
                    <tr>
                        <td><?= $mydoc->doc_id; ?></td>
                        <td><?= $mydoc->dtype; ?></td>
                        <td><?= $mydoc->owner; ?></td>
                        <td><?= $mydoc->name; ?></td>

                        <td><?php if ($mydoc->verified == 0) {
                            ?> <a href="<?php echo base_url() . "index.php/staff/verifydoc/" . $mydoc->doc_id; ?>">Verify</a></td>
                    <?php } else {
                                echo $mydoc->remarks . '</td><td>Verified';
                            } ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>