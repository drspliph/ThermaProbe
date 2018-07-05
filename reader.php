<?php
require_once 'setup.php';
$base_dir = '/sys/bus/w1/devices/';

$results = glob("{/sys/bus/w1/devices/28*}",GLOB_BRACE);

try {
    $dbh = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=UTF8", $db_user, $db_pass);
    //     $clsWaterToolz->dbh;
} catch (PDOException $e) {
    echo $e->getMessage();
    die("Dang fluxcapacitor is shot again!");
}


foreach ( $results as $dir ) {
    $file1 = $dir."/name";
    $name = file($file1, FILE_IGNORE_NEW_LINES);
    $file2 = $dir."/w1_slave";
    $data2 = file($file2, FILE_IGNORE_NEW_LINES);
    if ( preg_match('/YES$/', $data2[0] ) ) {
        if ( preg_match('/t=(\d+)$/', $data2[1], $matches, PREG_OFFSET_CAPTURE ) ) {
            $temp = $matches[1][0] / 1000;
        }
    }
//     echo "This name : ".$name[0]." har this reading : ".$temp." !\n";
}

// This is a good example of male caommitment issues
// All issues resolved
?>