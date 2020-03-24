<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div>
    <a href="<?php echo base_url() . "index.php/staff/mystudent/" . $admission_no; ?>">Student Details</a>
    <?php echo form_open_multipart('staff/remark');
    echo '<input type="hidden" name="arequest_id" value=' . $arequest_id . '>
    <input type="text" name="remark"><input type="submit" value="Submit">';
    ?></form>
</div>