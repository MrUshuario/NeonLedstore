<?php
function conexionDB()
{
    $db = new mysqli('localhost', 'root', '1234', 'ghxumdmy_neonledstore');
    mysqli_set_charset($db, "utf8");
    if (!$db) {
        echo "no se conecto";
        exit;
    }

    return $db;
}
