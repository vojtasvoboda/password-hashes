<?php

require '../src/Hasher/Hasher.php';

// init
$hashes = array();
$password = '';

// if we have password
if (isset($_GET['p'])) {

    // new Hasher
    $hasher = new Hasher($_GET['p']);

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
            html, body, h1, form, table, div, span, input, button { margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; }
            table { border-collapse: collapse; border-spacing: 0; }
            hr { display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; }
            input, select { vertical-align: middle; }
            body { font: 13px/1.231 sans-serif; *font-size: small; }
            select, input, textarea, button { font: 99% sans-serif; }
            button:hover { cursor: pointer; }
            /* own code mobile first */
            html { overflow-y: scroll; }
            body { font-size: 18px; }
            body, form input, table input { font-family: Consolas, 'Liberation Mono', Courier, monospace; }
            .clr { float: none; width: 100%; height: 1px; clear: both; }
            #wrapper { margin: 10px; position: relative; }
            h1 { font-size: 240%; font-weight: bold; margin-bottom: 10px; }
            label { display: none; }
            form input { display: block; border: 1px solid #aaa; }
            button { display: block; margin-bottom: 20px; padding: 10px 10px 5px; background-color: #ccc; border: 1px solid #aaa; vertical-align: middle; font-family: Consolas, 'Liberation Mono', Courier, monospace; }
            #password { font-size: 140%; width: 100%; padding: 3px 0; margin-bottom: 10px; }
            table { width: 100%; border: 1px solid #aaa; }
            table th { text-align: left; font-weight: bold; width: 100px; padding: 4px 4px 0; border: 1px solid #aaa; }
            table td { padding: 2px 4px; border: 1px solid #aaa; }
            table input { width: 100%; outline: none; padding: 4px 0 0 0; }
            @media (min-width: 860px) {
                body { margin-top: 15px; margin-bottom: 15px; }
                #wrapper { margin: 0 auto; width: 800px; border: 1px solid #999; padding: 20px; }
                h1 { font-size: 280%; }
                #password { padding: 6px 8px 4px; width: 782px; }
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <h1>Password Hasher 1.0</h1>
            <form action="" method="get">
                <label for="p">Please enter a password:</label>
                <input type="text" name="p" autofocus required id="password" placeholder="Type password (max 128 chars)" value="<?=$password;?>" />
                <button type="submit" id="submit">Shake it baby!</button>
            </form>
            <div class="clr"></div>
            <?php if(!empty($hashes)) {
            echo '<table class="hashes" rules="all">';
                foreach($hashes as $hash) {
                    echo '<tr class="hash">';
                    echo '<th class="title">' . $hash['title'] . '</th><td><input onClick="this.setSelectionRange(0, this.value.length)" value="' . $hash['hash'] . '" /></td>';
                    echo '</tr>';
                }
            echo '</table>';
            } ?>
        </div>
    </body>
</html>
