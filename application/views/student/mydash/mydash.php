<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div>
    <h4>Requests</h4>
    <table>
        <tr>
            <th>Request ID</th>
            <th>Request Type</th>
            <th>Reason</th>
            <th>Remarks</th>
            <th>Date Submitted</th>
            <th>submit</th>
            <th>advisor</th>
            <th>a_remarks</th>
            <th>hod</th>
            <th>h_remarks</th>
            <th>principal</th>
            <th>p_remarks</th>
            <th>office</th>
            <th>o_remarks</th>
            <th>completed</th>
        </tr>
        <?php foreach ($myrequests as $myrequest) { ?>

            <tr>
                <td><?= $myrequest->request_id; ?></td>
                <td><?= $myrequest->type; ?></td>
                <td><?= $myrequest->reason; ?></td>
                <td><?= $myrequest->remarks; ?></td>
                <td><?= $myrequest->submit_date; ?></td>
                <td><?= $myrequest->submit; ?></td>
                <td><?= $myrequest->advisor; ?></td>
                <td><?= $myrequest->a_remarks; ?></td>
                <td><?= $myrequest->hod; ?></td>
                <td><?= $myrequest->h_remarks; ?></td>
                <td><?= $myrequest->principal; ?></td>
                <td><?= $myrequest->p_remarks; ?></td>
                <td><?= $myrequest->office; ?></td>
                <td><?= $myrequest->o_remarks; ?></td>
                <td><?= $myrequest->completed; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>