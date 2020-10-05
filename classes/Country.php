<?php

    class Country extends QueryBuilder{

        public $countryAddChanged = null;
        public $statusCountryChanged = null;

        public function selectActiveCountries(){
            $sql = "select * from drzave where status_drzave_id = 1";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function selectAllCountries(){
            $sql = "select * 
                    from drzave d
                    left join statusi_drzava sd on sd.status_drzave_id = d.status_drzave_id
                    order by d.status_drzave_id, d.naziv_drzave
                    ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function countryStatuses(){
            $sql = "select * from statusi_drzava";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function insertCountry($drzava){
            $sql = "insert into drzave values(null,'{$drzava}',1)";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();

            if($provera){
                $this->countryAddChanged = true;
            }else{
                $this->countryAddChanged = false;
            }
        }

        public function updateCountryStatus($drzavaId,$statusDrzaveId){
            $sql = "update drzave set status_drzave_id = {$statusDrzaveId} where drzava_id = {$drzavaId} ";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();
    
            if($provera){
                $this->statusCountryChanged = true;
            }else{
                $this->statusCountryChanged = false;
            }
        } 

    }

?>