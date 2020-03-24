<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-8 text-left">
    <h5><a href="<?php echo base_url(); ?>index.php/staff/myclass">My Class</a></h5>
    <h1><?php echo $myclass['name']; ?></h1>
    <h3><a href="<?php echo base_url() . 'index.php/staff/sbasics/' . $myclass['admission_no']; ?>">Basics</a></h3>
    <h3><a href="<?php echo base_url() . 'index.php/staff/spersonal/' . $myclass['admission_no']; ?>">Personal</a></h3>
    <h3><a href="<?php echo base_url() . 'index.php/staff/sfamily/' . $myclass['admission_no']; ?>">Family</a></h3>
    <h3><a href="<?php echo base_url() . 'index.php/staff/sadmission/' . $myclass['admission_no']; ?>">Admission</a></h3>
    <h3><a href="<?php echo base_url() . 'index.php/staff/shostel/' . $myclass['admission_no']; ?>">Hostel</a></h3>
    <h3><a href="<?php echo base_url() . 'index.php/staff/sacadentry/' . $myclass['admission_no']; ?>">Acadamic Entry Level</a></h3>
    <h3><a href="<?php echo base_url() . 'index.php/staff/sacadexit/' . $myclass['admission_no']; ?>">Acadamic Exit Level</a></h3>
    <h3><a href="<?php echo base_url() . 'index.php/staff/getDocs/' . $myclass['admission_no']; ?>">Documents</a></h3>


</div>