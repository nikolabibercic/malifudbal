<?php

    class Team extends QueryBuilder{

        public $insertTeamStatus = null;
        public $duplicateTeamStatus = null;
        public $teamDeleteChanged = null;

        public function insertTeam($nazivEkipe,$mesto,$telefon,$email,$nazivTurnira,$drzava){
            $sql = "insert into ekipe values(null,'{$nazivEkipe}',{$drzava},'{$mesto}','{$email}','{$telefon}','{$nazivTurnira}',current_timestamp(),2)";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();
            //$last_id = $this->db->lastInsertId();//ako su podaci insertovani, uzima ID

            if($provera){
                $this->insertTeamStatus = true;
            }else{
                $this->insertTeamStatus = false;
            }

            //return $last_id;
        }

        public function checkTeamId($nazivEkipe, $turnirId){
            $sql = "select e.turnir_id, t.naziv_turnira, e.ekipa_id
                    from ekipe e
                    inner join turniri t on t.turnir_id = e.turnir_id 
                    where e.naziv_ekipe = trim('{$nazivEkipe}') and t.turnir_id = {$turnirId}
                    "; // $nazivTurnira je ID turnira
            $query = $this->db->prepare($sql);
            $query->execute();
            
            $checkTeamId = $query->fetch(PDO::FETCH_OBJ);

            return $checkTeamId;
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

        public function selectAllTeams(){
            $sql = "select e.ekipa_id, e.naziv_ekipe, t.naziv_turnira, t.datum_pocetka
                    from ekipe e
                    inner join turniri t on t.turnir_id = e.turnir_id
                    order by t.datum_pocetka desc, e.naziv_ekipe asc
                     ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function selectAllTeamsRegistrationPaid(){
            $sql = "select e.ekipa_id, e.naziv_ekipe as Ekipa, t.naziv_turnira as Turnir, t.datum_pocetka, su.status_uplate as Kotizacija
                    from ekipe e
                    inner join turniri t on t.turnir_id = e.turnir_id
                    inner join statusi_uplata su on su.status_uplate_id = e.status_uplate_id
                    where e.status_uplate_id = 1 and t.status_turnira_id = 1
                    order by t.datum_pocetka desc, e.naziv_ekipe asc
                     ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function deleteTeam($ekipaId){
            //kada se brise ekipa brisu se i svi igraci te ekipe. 
            $sql = "
                delete from igraci where ekipa_id = {$ekipaId};
                delete from ekipe where ekipa_id = {$ekipaId};
            ";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();

            if($provera){
                $this->teamDeleteChanged = true;
            }else{
                $this->teamDeleteChanged = false;
            }
        }
    }

?>