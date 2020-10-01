<?php

    class Role extends QueryBuilder{

        public $roleUpdateChanged = null;
        public $roleInsertChanged = null;

        //Ovde prikazujem sve korisnike koji imaju dodeljeno neko pravo
        public function selectUserRole(){
            $sql = "select p.pravo_id, p.naziv_prava, k.korisnik_id, k.naziv_korisnika, kp.korisnik_pravo_id
                    from prava p
                    inner join korisnici_prava kp on kp.pravo_id = p.pravo_id
                    inner join korisnici k on k.korisnik_id = kp.korisnik_id
                    order by k.naziv_korisnika, p.naziv_prava
                     ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        //Ovde prikazujem sve korisnike bez obzira da li imaju neko pravo
        public function selectAllUsers(){
            $sql = "select p.pravo_id, p.naziv_prava, k.korisnik_id, k.naziv_korisnika
                    from prava p
                    inner join korisnici_prava kp on kp.pravo_id = p.pravo_id
                    right join korisnici k on k.korisnik_id = kp.korisnik_id
                    order by k.naziv_korisnika
                     ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function selectRoles(){
            $sql = "select * from prava";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function updateRole($korisnikPravoId,$pravoId){

            $sql = "update korisnici_prava set pravo_id = {$pravoId} where korisnik_pravo_id = {$korisnikPravoId} ";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();

            if($provera){
                $this->roleUpdateChanged = true;
            }else{
                $this->roleUpdateChanged = false;
            }
        }

        public function insertRole($korisnikId,$pravoId){

            $sql = "insert into korisnici_prava values(null,$korisnikId,$pravoId)";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();

            if($provera){
                $this->roleInsertChanged = true;
            }else{
                $this->roleInsertChanged = false;
            }
        }
    }

?>