<?php
    class QueryBuilder{
        
        public $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function select($table){
            $sql = "select * from {$table}";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }
    }
?>