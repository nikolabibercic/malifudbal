<?php

    class Tournament extends QueryBuilder{


        public function selectActiveTournaments(){
            $sql = "select * from turniri where status_turnira_id = 1";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }
    }

?>