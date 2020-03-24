<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="login col-sm-8 text-left">
    <h5><a href="<?php echo base_url(); ?>index.php/home/profile">Profile</a></h5>
    <h3>Personal</h3>
    <h9>Name:</h9>
    <?php
    echo $personal['name'];
    ?><br>
    <h9>Gender:</h9>
    <?php
    echo $personal['gender'];
    ?><br>
    <h9>Date of Birth:</h9>
    <?php
    echo $personal['dob'];
    ?><br>
    <h9>Phone:</h9>
    <?php
    echo $personal['phone'];
    ?><br>
    <h9>Mobile:</h9>
    <?php
    echo $personal['mobile'];
    ?><br>
    <h9>Address:</h9>
    <?php
    echo $personal['address'];
    ?><br>
    <h9>Email:</h9>
    <?php
    echo $personal['email'];
    ?><br>
    <h9>Category:</h9>
    <?php
    echo $personal['category'];
    ?><br>


</div>