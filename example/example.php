<?php

require '../src/Hasher/Hasher.php';

// gets hash (max 128 chars)
$password = isset($_GET['p']) ? $_GET['p'] : false;

// if we have password
if ($password) {

    // new Hasher
    $hasher = new Hasher($password);

    // get cleaned password for HTML input
    $password = $hasher->getPassword();

}

?>
<!doctype html>
<html class="no-js" lang="cs">
    <head>
        <meta charset="utf-8">
        <title>Password Hashed</title>
        <style>
            body, input {
                font-family: Consolas, 'Liberation Mono', Courier, monospace;
                font-size: 18px;
            }
            #wrapper {
                margin: 0 auto;
                width: 920px;
                border: 1px solid #aaa;
                padding: 0 20px 30px;
            }
            #p {
                font-size: 140%;
                padding: 5px 10px;
                width: 400px;
            }
            #submit {
                display: block;
                padding: 15px;
                width: 100px;
            }
            .clr {
                float: none;
                width: 100%;
                height: 1px;
                clear: both;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <h1>Password Hasher</h1>
            <form action="" method="get">
                <label for="p">Please enter a password:</label><br />
                <input type="text" name="p" id="p" placeholder="Password max 128 characters." value="<?=$password;?>" />
                <input type="submit" value="Hash!" id="submit" />
            </form>
            <div class="clr"></div>
            <?php if(!empty($hashes)) {
                foreach($hashes as $hash) {
                    echo '<div class="hash">';
                    echo '<span class="title">' . $hash['title'] . '</span><span>' . $hash['hash'] . '</span>';
                    echo '</div>';
                }
            } ?>
        </div>
    </body>
</html>
