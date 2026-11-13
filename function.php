<?php
function handler(): string {
    return "Function executed at " . date('Y-m-d H:i:s') . " (" . php_uname('n') . ")";
}
echo handler() . PHP_EOL;
