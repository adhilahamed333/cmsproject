<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-8 text-left">
    <h5><a href="<?php echo base_url() . 'index.php/staff/mystudent/' . $family['admission_no']; ?>">Profile</a></h5>
    <h3>Family</h3>
    <h9>Name of Father/Mother:</h9>
    <?php
    echo $family['name_of_fm'];
    ?><br>
    <h9>Occupation of Father/Mother:</h9>
    <?php
    echo $family['occupation_of_fm'];
    ?><br>
    <h9>Address of Father/Mother:</h9>
    <?php
    echo $family['address_of_fm'];
    ?><br>
    <h9>Phone of Father/Mother:</h9>
    <?php
    echo $family['phone_of_fm'];
    ?><br>
    <h9>Email of Father/Mother:</h9>
    <?php
    echo $family['email_of_fm'];
    ?><br>
    <h9>Name of Local Guardian:</h9>
    <?php
    echo $family['name_of_lg'];
    ?><br>
    <h9>Relationship with Local Guardian:</h9>
    <?php
    echo $family['relation_with_lg'];
    ?><br>
    <h9>Occupation of Local Guardian:</h9>
    <?php
    echo $family['occupation_of_lg'];
    ?><br>
    <h9>Address of Local Guardian:</h9>
    <?php
    echo $family['address_of_lg'];
    ?><br>
    <h9>Phone of Local Guardian:</h9>
    <?php
    echo $family['phone_of_lg'];
    ?><br>
    <h9>Email of Local Guardian:</h9>
    <?php
    echo $family['email_of_lg'];
    ?><br>


</div>