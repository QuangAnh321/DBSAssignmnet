<?php

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "root");
    define("DB_NAME", "dbsassignment");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        echo "Fail to connect: ". mysqli_connect_error();
    }
    /* Added utf-8 support for Mysql in order to display Vietnamese contents */
    if (!$conn->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $conn->error);
    } else {
        $conn->character_set_name();
    }

?>