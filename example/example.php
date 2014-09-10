<?php

require '../src/Hasher/Hasher.php';

// gets hash (max 128 chars)
$password = isset($_GET['p']) ? $_GET['p'] : false;

// init
$hashes = array();

// if we have password
if ($password) {

    // new Hasher
    $hasher = new Hasher($password);

    // get cleaned password for HTML input
    $password = $hasher->getPassword();

    $hashes[] = array('title' => 'first', 'hash' => 'asdf');
    $hashes[] = array('title' => 'second', 'hash' => 'fads');

}

?>
<!doctype html>
<html class="no-js" lang="cs">
    <head>
        <meta charset="utf-8">
        <title>Password Hashed</title>
        <style>
            * { padding: 0; margin: 0; }
            body, input { font-family: Consolas, 'Liberation Mono', Courier, monospace; font-size: 18px; }
            #wrapper { margin: 0 auto; width: 920px; border: 1px solid #aaa; padding: 0 20px 30px; }
            #p { font-size: 140%; padding: 5px 10px; width: 400px; }
            #submit { display: block; width: 150px; height: 40px; }
            .hashes { margin-top: 15px; border: 1px solid #aaa; }
            tr { text-align: left; }
            th, td { padding: 8px 8px 4px; }
            .clr { float: none; width: 100%; height: 1px; clear: both; }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <h1>Password Hasher</h1>
            <form action="" method="get">
                <label for="p">Please enter a password:</label><br />
                <input type="text" name="p" id="p" placeholder="Password max 128 characters." value="<?=$password;?>" />
                <input type="submit" value="Shake it baby!" id="submit" />
            </form>
            <div class="clr"></div>
            <?php if(!empty($hashes)) {
            echo '<table class="hashes" rules="all">';
                foreach($hashes as $hash) {
                    echo '<tr class="hash">';
                    echo '<th class="title">' . $hash['title'] . '</th><td>' . $hash['hash'] . '</td>';
                    echo '</tr>';
                }
            echo '</table>';
            } ?>
        </div>
    </body>
</html>
