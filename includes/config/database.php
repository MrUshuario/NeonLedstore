<?php
function conexionDB()
{
    $db = new mysqli('localhost', 'root', '', 'ghxumdmy_neonledstore');
    mysqli_set_charset($db, "utf8");
    if (!$db) {
        echo "no se conecto";
        exit;
    }

    return $db;
}
