<?php

    class User extends QueryBuilder{

        public $userLogged = null;

        public function LoginUser($email,$password){
            $sql = "select * from korisnici k where k.email = '{$email}' and k.sifra = '{$password}' ";
            $query = $this->db->prepare($sql);
            $query->execute();
            
            //Ovde koristim fetch metodu jer vraca samo jedan podatak, ne koristim fetchAll
            $userLogged = $query->fetch(PDO::FETCH_OBJ);

            if($userLogged != null){

                $this->userLogged = $userLogged;
                $_SESSION['korisnik'] = $userLogged;

                header('Location: index.php');
            }else{
                header('Location: login.view.php');
            }       
        }

        public function checkUserAdmin($korisnik_id){
            $sql = "select * from korisnici_prava k where k.korisnik_id = {$korisnik_id} ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $checkUserAdmin = $query->fetch(PDO::FETCH_OBJ);
            return $checkUserAdmin;
        }
    }
?>