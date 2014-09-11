<?php

require '../src/Hasher/Hasher.php';

echo '<pre>';
$password = "test";

// new Hasher
$hasher = new Hasher($password);

// get SHA-1
$sha1 = $hasher->getSha1();
echo 'SHA-1: ' . $sha1 . '<br>';

// get MD5
$md5 = $hasher->getMd5();
echo 'MD5: ' . $md5 . '<br>';

// get all known hashes
echo '<br>';
$hashes = $hasher->getAllHashes();
print_r($hashes);
