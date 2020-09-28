<?php

    class Team extends QueryBuilder{

        public $insertTeamStatus = null;

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
    }

?>