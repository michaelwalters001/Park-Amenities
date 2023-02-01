<?php
    //
    // This file will connect to the database and fetch the items from the phpmyadmin database.
    // Once the information is grabed it will then send it into a array that is in json_encoded and unloaded in
    // The Park Amenities HTML display page
    //

    include 'List.php';

    $parkList = [];

    try {
            $dbh= new PDO("mysql:host=localhost;dbname=test","root","");
        } catch(Exception $e) {
            die("ERROR: Couldn't connect. {$e->getMessage()}");
        }

        $command = "SELECT * FROM parks";
        $stmt = $dbh->prepare($command);
        $success = $stmt->execute();

        if($success)
        {
            while($row = $stmt->fetch())
            {
                // creates a new item and sends it to a new array
                $park = new Park($row["LONGITUDE"], $row["LATITUDE"], $row["DESCRIPTION"], $row["TYPE"], $row["OWNERSHIP"], $row["REC_AREA"], $row["OBJECTID"], $row["ID"]);
                array_push($parkList, $park);
            }
            //encodes the array
            echo json_encode($parkList);
        }



?>