<?php

    class Team extends QueryBuilder{

        public $insertTeamStatus = null;
        public $duplicateTeamStatus = null;

        public function insertTeam($nazivEkipe,$mesto,$telefon,$email,$nazivTurnira,$drzava){
            $sql = "insert into ekipe values(null,'{$nazivEkipe}',{$drzava},'{$mesto}','{$email}','{$telefon}','{$nazivTurnira}',current_timestamp())";
            $query = $this->db->prepare($sql);
            $query->execute();
            $last_id = $this->db->lastInsertId();//ako su podaci insertovani, uzima ID

            if($last_id){
                $this->insertTeamStatus = true;
            }else{
                $this->insertTeamStatus = false;
            }
        }

        public function checkDuplicateTeam($nazivEkipe, $nazivTurnira){
            $sql = "select e.turnir_id, t.naziv_turnira
                    from ekipe e
                    inner join turniri t on t.turnir_id = e.turnir_id 
                    where e.naziv_ekipe = trim('{$nazivEkipe}') and t.turnir_id = {$nazivTurnira}
                    "; // $nazivTurnira je ID turnira
            $query = $this->db->prepare($sql);
            $query->execute();
            
            //Ovde koristim fetchAll metodu da jer prvobitno je moglo da bude vise istih naziva ekipa
            $duplicateTeam = $query->fetchAll(PDO::FETCH_OBJ);

            if($duplicateTeam != null){
                $this->duplicateTeamStatus = $duplicateTeam;
            }else{
                $this->duplicateTeamStatus = false;
            }

            return $duplicateTeam;
        }
    }

?>