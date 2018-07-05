<?php
$base_dir = '/sys/bus/w1/devices/';

$results = glob("{/sys/bus/w1/devices/28*}",GLOB_BRACE);

print $results;
// foreach ( $results as )

?>