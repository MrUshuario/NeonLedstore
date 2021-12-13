<?php
function conexionDB()
{
    $db = new mysqli('localhost', 'Saint', 'Joseph23@', 'ghxumdmy_neonledstore');
    //mysqli_set_charset($db, "utf8");
    if (!$db) {
        echo "no se conecto";
        exit;
    }

    return $db;
}
