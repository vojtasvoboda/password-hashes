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

    // get all known hashes
    $hashes = $hasher->getAllHashes();

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
            body { font-family: Consolas, 'Liberation Mono', Courier, monospace; font-size: 18px; margin-top: 20px; margin-bottom: 20px; }
            #wrapper { margin: 0 auto; width: 800px; border: 1px solid #666; padding: 20px 30px; }
            h1 { font-size: 240%; font-weight: bold; margin-bottom: 15px; }
            label { display: block; margin-bottom: 5px; }
            #password { font-size: 140%; padding: 8px 10px 5px 10px; width: 600px; margin-bottom: 10px; font-family: Consolas, 'Liberation Mono', Courier, monospace; }
            #submit { display: block; width: 150px; height: 40px; margin-bottom: 15px; padding: 0; vertical-align: bottom; }
            #submit:hover { cursor: pointer; }
            .hashes { margin-top: 15px; border: 1px solid #aaa; }
            .hashes input { width: 660px; border: 0; }
            tr { text-align: left; }
            th, td { padding: 8px 8px 4px; }
            .clr { float: none; width: 100%; height: 1px; clear: both; }
            @media (max-width: 860px) {
                body { margin-top: 0; }
                #wrapper { margin: 0; border: 0; padding: 10px; }
                #password { width: 440px; }
                .hashes { width: 465px; }
                .hashes input { width: 100%; }
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <h1>Password Hasher</h1>
            <form action="" method="get">
                <label for="p">Please enter a password:</label>
                <input type="text" name="p" id="password" placeholder="Password max 128 characters." value="<?=$password;?>" />
                <button type="submit" id="submit">Shake it baby!</button>
            </form>
            <div class="clr"></div>
            <?php if(!empty($hashes)) {
            echo '<table class="hashes" rules="all">';
                foreach($hashes as $hash) {
                    echo '<tr class="hash">';
                    echo '<th class="title">' . $hash['title'] . '</th><td><input value="' . $hash['hash'] . '" /></td>';
                    echo '</tr>';
                }
            echo '</table>';
            } ?>
        </div>
    </body>
</html>
