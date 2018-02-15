<?php
$f = $_GET['first'];
$s = $_GET['second'];
$d = (int)$s - (int)$f;
$t = $d + $s;
echo $t;
?>