<?php

// gets hash (max 128 chars)
$password = isset($_GET['p']) ? $_GET['p'] : false;

// if we have password
if ($password) {

    // new Hasher
    $hasher = new Hasher($password);

    // get cleaned password for HTML input
    $password = $hasher->getPassword();

}
