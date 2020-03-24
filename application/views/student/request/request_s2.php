<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<h3>Your request has been submitted</h3>
<h9>Request Id:</h9>
<?php
echo $request_id;
if ($doc_id) { ?><br>
    <h9>Document Id:</h9>
<?php
    echo $doc_id;
}
?><br>