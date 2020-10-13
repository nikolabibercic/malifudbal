<?php

    class Post extends QueryBuilder{

        //public $insertTeamStatus = null;
        public $postInserted = null;
        public $statusChanged = null;

        public function selectPosts(){
            //ovde selektujem samo aktivne postove
            $sql = "select * from poruke where status_poruke_id = 1 order by datum_poruke desc";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function selectTopThreePosts(){
            //ovde selektujem samo aktivne postove
            $sql = "select * from poruke where status_poruke_id = 1 order by datum_poruke desc limit 3";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function insertPost($naslov,$tekst,$korisnikId){
            $sql = "insert into poruke values(null,'{$naslov}','{$tekst}',current_timestamp(),$korisnikId,1)";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();
            //$last_id = $this->db->lastInsertId();//ako su podaci insertovani, uzima ID

            if($provera){
                $this->postInserted = true;
            }else{
                $this->postInserted = false;
            }
        }

        public function selectAllPosts(){
            $sql = "select  p.poruka_id, p.naslov, s.status_poruke, p.datum_poruke
                    from poruke p
                    inner join statusi_poruka s on s.status_poruke_id = p.status_poruke_id
                    order by p.datum_poruke desc
                     ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function selectPostStatuses(){
            $sql = "select * from statusi_poruka";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function updatePostStatus($porukaId,$statusPoruke){

            $sql = "update poruke set status_poruke_id = {$statusPoruke} where poruka_id = {$porukaId} ";
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