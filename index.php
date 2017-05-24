<?php
mb_internal_encoding("UTF-8");

function autoloadFunkce($trida) {
    // Končí název třídy řetězcem "Kontroler" ?
    if (preg_match('/Kontroler$', $trida))
        require("kontrolery/" . $trida . ".php");
    else
        require("modely/" . $trida . ".php");
}

spl_autoload_register("autoloadFunkce");