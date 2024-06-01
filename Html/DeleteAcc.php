<?php

global $ConfirmedDelAcc;

$ConfirmedDelAcc = true;

 
 
    ?>
  

 

<form id="DelDetForm" onsubmit="return false"  >
 
    <div>
        <label for="UserDelName">User Name:</label>
        <input type="text" autocomplete required id="UserDelName" name="UserDelName">
    </div>

    <div>
        <label for="UserDelPswd">Password:</label>
        <input type="text" required id="UserDelPswd" name="UserDelPswd">
    </div>

    <div>
        <input id="submitDelDet" type="submit" name="submitDelDet" onclick="ReqDel(event,1);" value="Submit">
        <input id="submitDelDel" type="submit" name="submitDelDel" onclick=" ReqDel(event,2); " formnovalidate value="Cancel">
    </div>
</form>

 

    <?php
 
 exit

?>