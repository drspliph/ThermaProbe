<?php


$base_dir = '/sys/bus/w1/devices/';

$results = glob("{/sys/bus/w1/devices/28*/w1_slave}",GLOB_BRACE);


foreach ( $results as $file ) {
    $data = file($file, FILE_IGNORE_NEW_LINES);
    
    $temperature = null;
    if ( preg_match('/YES$/', $data[0] ) ) {
        if ( preg_match('/t=(\d+)$/', $data[1], $matches, PREG_OFFSET_CAPTURE ) ) {
            $temperature = $matches[1][0] / 1000;
        }
    }
    
    if ($temperature) {
        echo "Temperature is ${temperature}C\n";
}else{
    echo "Unable to get temperature\n";
}
}

?>