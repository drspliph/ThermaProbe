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
    $probeArray = array();
    $probenamefile = $dir."/name";
    $probe = file($probenamefile, FILE_IGNORE_NEW_LINES);
    $probedatafile = $dir."/w1_slave";
    $probedata = file($probedatafile, FILE_IGNORE_NEW_LINES);
    if ( preg_match('/YES$/', $probedata[0] ) ) {
        if ( preg_match('/t=(\d+)$/', $probedata[1], $matches, PREG_OFFSET_CAPTURE ) ) {
            $temp = $matches[1][0] / 1000;
        }
    }
    $probeArray['when'] = now();
    $probeArray['reading'] = $temp;
    $probeArray['source'] = $probe;
    $probeArray['Logger'] = $logger;
    $result = $clsThermaClass->updateDB($probeArray);
//     echo "This name : ".$name[0]." har this reading : ".$temp." !\n";
}

// This is a good example of male caommitment issues
// All issues resolved
?>