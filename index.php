<?php
mb_internal_encoding("UTF-8");

function autoloadFunction($class) {
    // Končí název třídy řetězcem "Controler" ?
    if (preg_match('/Controler$', $class))
        require("controlers/" . $class . ".php");
    else
        require("model/" . $class . ".php");
}

spl_autoload_register("autoloadFunction");