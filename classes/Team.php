<?php

    class Team extends QueryBuilder{

        public $insertTeamStatus = null;

        public function insertTeam($nazivEkipe,$mesto,$telefon,$email,$nazivTurnira){
            $sql = "insert into ekipe values(null,'{$nazivEkipe}','{$mesto}','{$telefon}','{$email}','{$nazivTurnira}',current_timestamp())";
            $query = $this->db->prepare($sql);
            $query->execute();

            if($query){
                $this->insertTeamStatus = true;
            }else{
                $this->insertTeamStatus = false;
            }
        }
    }

?>