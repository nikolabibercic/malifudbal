<?php

    class Post extends QueryBuilder{

        //public $insertTeamStatus = null;

        public function selectPosts(){
            $sql = "select * from poruke where status_poruke_id = 1 order by datum_poruke desc";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }
    }

?>