<?php
    class Connection{
        
        public $host='localhost';
        public $dbname='malifudbal';
        public $username='root';
        public $password='';

        public function connect(){
            try{
                return new PDO("mysql:host={$this->host};dbname={$this->dbname};",$this->username,$this->password);
            }catch(PDOException $e){
                echo 'Error'.$e->getMessage();
            }
        }
    }
?>