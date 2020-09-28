<?php

    class Tournament extends QueryBuilder{

        public $tournamentInserted = null;

        public function selectActiveTournaments(){
            $sql = "select * from turniri where status_turnira_id = 1";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function insertTournament($naziv,$datum,$napomena){

            $sql = "insert into turniri values(null,'{$naziv}','{$datum}',1,'{$napomena}')";
            $query = $this->db->prepare($sql);
            $query->execute();
            $last_id = $this->db->lastInsertId();//ako su podaci insertovani, uzima ID

            if($last_id){
                $this->tournamentInserted = true;
            }else{
                $this->tournamentInserted = false;
            }

            //return $this->tournamentInserted;
        }
    }

?>