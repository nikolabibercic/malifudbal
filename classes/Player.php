<?php

    class Player extends QueryBuilder{

        public $insertPlayerStatus = null;

        public function insertPlayer($ime,$prezime,$ekipaId){
            $sql = "insert into igraci values(null,'{$ime}','{$prezime}',null,{$ekipaId})";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();
            //$last_id = $this->db->lastInsertId();//ako su podaci insertovani, uzima ID

            if($provera){
                $this->insertPlayerStatus = true;
            }else{
                $this->insertPlayerStatus = false;
            }
        }
    }

?>