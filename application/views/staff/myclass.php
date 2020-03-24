<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-8 text-left">
    <h1>My Class(<?php
                    echo $_SESSION['branch_in_charge'] . ', S' . $_SESSION['sem_in_charge'];
                    ?>):</h1>
    <table>
        <tr>
            <th>Admission Number</th>
            <th>Name</th>
            <th>Cousre</th>
            <th>Branch</th>
            <th>Semester</th>
            <th>Univercity Registration Number</th>
            <th></th>
        </tr>
        <?php if ($myclass) {
            foreach ($myclass as $myclasses) { ?>

                <tr>
                    <td><?= $myclasses->admission_no; ?></td>
                    <td><?= $myclasses->name; ?></td>
                    <td><?= $myclasses->course; ?></td>
                    <td><?= $myclasses->branch; ?></td>
                    <td><?= $myclasses->semester; ?></td>
                    <td><?= $myclasses->univercity_reg_no; ?></td>
                    <td><a href="<?php echo base_url()."index.php/staff/mystudent/".$myclasses->admission_no; ?>">More...</a></td>
                </tr>
        <?php }
        } ?>
    </table>



</div>