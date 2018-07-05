<?php
$base_dir = '/sys/bus/w1/devices/';

$results = glob("{/sys/bus/w1/devices/28*}",GLOB_BRACE);

print_r($results);
// foreach ( $results as )

?>