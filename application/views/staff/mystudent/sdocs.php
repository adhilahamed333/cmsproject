<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-8 text-left">


    <table>
        <tr>
            <th>Document ID</th>
            <th>Type</th>
        </tr>
        <?php if ($mydocs) {
            foreach ($mydocs as $mydoc) { ?>

                <tr>
                    <td><?= $mydoc->doc_id; ?></td>
                    <td><?= $mydoc->dtype; ?></td>
                    <td><a href="<?php echo base_url() . 'index.php/mydash/viewdoc/' . $mydoc->doc_id; ?>">View</a></td>
                </tr>
        <?php }
        } ?>
    </table>
</div>