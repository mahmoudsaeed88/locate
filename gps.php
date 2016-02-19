<?php
    if (!empty($_GET['ID']) && !empty($_GET['latitude']) && !empty($_GET['longitude'])) {

        function getParameter($par, $default = null){
            if (isset($_GET[$par]) && strlen($_GET[$par])) return $_GET[$par];
            elseif (isset($_POST[$par]) && strlen($_POST[$par])) 
                return $_POST[$par];
            else return $default;
        }
        $ID = getParameter("ID");
        $lat = getParameter("latitude");
        $lon = getParameter("longitude");
        
        echo "
            DATA:\n
            ID: ".$ID."\n
            Latitude: ".$lat."\n
            Longitude: ".$lon;
        //----------------------------------------------------------------------------------
        ##INSERT A NEW BRACELET INFO
        include 'connect.php';
        $insertusersql= "INSERT INTO current (ID,LATITUDE,LONGTUDE,TIME) VALUES ('$ID','$lat','$lon', CURRENT_TIMESTAMP)";
        if($dbconnect->query($insertusersql) === TRUE ){
            echo "User ADd Successfuly :) " ;
        }else{
            echo " ERROR " ;
        }
    }
?>