<?php

require 'mysqlclass.php';

    $mysql = new ProcessMySQL;

    print_r($mysql->getEmailAddressesByMajor("Software Engineer"));

    ?>

 