<?php
$base_dir = '/sys/bus/w1/devices/';
$device_folder = glob($base_dir . '28*')[0];

print_r($device_folder);
// foreach ( $device_folder as $where ) {
//     $device_file = $where . '/w1_slave';
//     $data = file($device_file, FILE_IGNORE_NEW_LINES);
    
//     $temperature = null;
//     if (preg_match('/YES$/', $data[0])) {
//         if (preg_match('/t=(\d+)$/', $data[1], $matches, PREG_OFFSET_CAPTURE)) {
//             $temperature = $matches[1][0] / 1000;
//         }
//     }
    
//     if ($temperature) {
//         echo "Temperature is ${temperature}C\n";
//     } else {
//         echo "Unable to get temperature\n";
//     }
    
// }

?>




