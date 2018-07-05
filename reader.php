<?php
$base_dir = '/sys/bus/w1/devices/';

$results = glob("{/sys/bus/w1/devices/28*}",GLOB_BRACE);

print_r($results);
foreach ( $results as $dir ) {
    $file1 = $dir."/name";
    $data1 = file($file1, FILE_IGNORE_NEW_LINES);
    echo "File is : ".$data1[0]."\n";

    $file2 = $dir."/w1_slave";
    $data2 = file($file2, FILE_IGNORE_NEW_LINES);
    if ( preg_match('/YES$/', $data2[0] ) ) {
        if ( preg_match('/t=(\d+)$/', $data2[1], $matches, PREG_OFFSET_CAPTURE ) ) {
            $temp = $matches[1][0] / 1000;
        }
    }
    
    echo "Temp is : ".$temp."\n";
//     $data = file(, FILE_IGNORE_NEW_LINES);
}



?>