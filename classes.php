<?php

class ThermaClass {
    public function updateDB($array) {
        
        global $db_host;
        global $db_port;
        global $db_user;
        global $db_pass;
        global $db_name;
        
        $params = array();
        $params[] = $array['when'];
        $params[] = $array['reading'];
        $params[] = $array['source'];
        $params[] = $array['Logger'];
        
        try {
            $dbh = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=UTF8", $db_user, $db_pass);
            //     $clsWaterToolz->dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Dang fluxcapacitor is shot again!");
        }
        $sql = "INSERT INTO ThermaProbe.RawData
            (
                when,
                reading,
                source,
                Logger
            )
            values
            (?,?,?,?)
                ;
            ";
        $stmt = $dbh->prepare($sql);
        $result = $stmt->execute($params);
        return $result;
        // What the fuck ?? 
    }
    
}