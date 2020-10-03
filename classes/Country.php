<?php

    class Country extends QueryBuilder{


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

    }

?>