<?php

    class User extends QueryBuilder{

        public $userLogged = null;

        public function LoginUser($email,$password){
            $sql = "select * from korisnici k where k.email = '{$email}' and k.sifra = '{$password}' ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $userLogged = $query->fetchAll(PDO::FETCH_OBJ);

            if($userLogged != null){

                $this->userLogged = $userLogged;
                $_SESSION['korisnik'] = $userLogged;

                header('Location: index.php');
            }else{
                header('Location: login.view.php');
            }       
        }
    }
?>