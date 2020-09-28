<?php

    class Post extends QueryBuilder{

        //public $insertTeamStatus = null;
        public $postInserted = null;

        public function selectPosts(){
            $sql = "select * from poruke where status_poruke_id = 1 order by datum_poruke desc";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function insertPost($naslov,$tekst,$korisnikId){
            $sql = "insert into poruke values(null,'{$naslov}','{$tekst}',current_timestamp(),$korisnikId,1)";
            $query = $this->db->prepare($sql);
            $query->execute();
            $last_id = $this->db->lastInsertId();//ako su podaci insertovani, uzima ID

            if($last_id){
                $this->postInserted = true;
            }else{
                $this->postInserted = false;
            }
        }
    }

?>