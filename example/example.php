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
            /* reset */
            html, body, h1, form, table, div, span { margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; }
            table { border-collapse: collapse; border-spacing: 0; }
            hr { display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; }
            input, select { vertical-align: middle; }
            body { font: 13px/1.231 sans-serif; *font-size: small; } /* Hack retained to preserve specificity */
            select, input, textarea, button { font: 99% sans-serif; }
            /* own code */
            body { font-family: Consolas, 'Liberation Mono', Courier, monospace; font-size: 18px; margin-top: 20px; }
            #wrapper { margin: 0 auto; width: 920px; border: 1px solid #aaa; padding: 20px; }
            h1 { font-size: 200%; font-weight: bold; margin-bottom: 15px; }
            #p { font-size: 140%; padding: 8px 10px 5px 10px; width: 400px; margin-bottom: 10px; font-family: Consolas, 'Liberation Mono', Courier, monospace; }
            #submit { display: block; width: 150px; height: 40px; margin-bottom: 15px; }
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
