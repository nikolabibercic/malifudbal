<?php

    class Tournament extends QueryBuilder{

        public $tournamentInserted = null;
        public $statusChanged = null;

        public function selectActiveTournaments(){
            $sql = "select * from turniri where status_turnira_id = 1";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function selectAllTournaments(){
            $sql = "select  t.turnir_id, t.naziv_turnira, s.status_turnira
                    from turniri t
                    inner join statusi_turnira s on s.status_turnira_id = t.status_turnira_id
                     ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function selectTournamentStatuses(){
            $sql = "select * from statusi_turnira";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function insertTournament($naziv,$datum,$napomena){

            $sql = "insert into turniri values(null,'{$naziv}','{$datum}',1,'{$napomena}')";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();
            //$last_id = $this->db->lastInsertId();//ako su podaci insertovani, uzima ID

            if($provera){
                $this->tournamentInserted = true;
            }else{
                $this->tournamentInserted = false;
            }

            //return $this->tournamentInserted;
        }

        public function updateTournamentStatus($turnirId,$statusTurnira){

            $sql = "update turniri set status_turnira_id = {$statusTurnira} where turnir_id = {$turnirId} ";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();

            if($provera){
                $this->statusChanged = true;
            }else{
                $this->statusChanged = false;
            }
        }
    }

?>