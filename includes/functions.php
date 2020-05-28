<?php

function checkQuery($result) {
    global $connection;
    if (!$result) {
        die("FAILED" . mysqli_error($connection));
    }
}


?>