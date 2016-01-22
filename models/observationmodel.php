<?php
    /*
     * @author: Oleksandr Gorkovets
     * @version: 1
     * @date: 1/21/2016
     */
    
    class ObservationModel{
        public $db;
        
        public function __construct(PDO $new_db){
            $this->db = $new_db;
        }
        
        public function getAllObservations(){            
           $result = $this->db->query("SELECT hive_name, observation_date, duration, mite_count FROM oleksand_beehive.observation");
            return $result;
        }
    }

?>
