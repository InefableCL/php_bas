<?php
$scandir=scandir(ENGINE_DIR);
$lib_file = array_splice($scandir, 2);

foreach ($lib_file as $file) {
    if ($file != "lib_autoload.php") {
        include ENGINE_DIR . $file;
    }
}