<?php
    /*
     * @author: Oleksandr Gorkovets
     * @version: 1
     * @date: 1/21/2016
     */
    
        $servername = "localhost";
        $username = "oleksand_galex";
        $databasename = "oleksand_beehive";
        $password = "IT135SprinG2013";  
          
      try {
          $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            echo 'Connected to database';
      }
      catch(PDOException $ex) {
          echo 'Connection error:' . $ex->getMessage();
      }
      include 'models/observationmodel.php';
      $obsModel = new ObservationModel($dbh);
      $obsList = $obsModel->getAllObservations();
      include 'views/beedata-table.php';
      $db = null;
 ?>

