<?php

    class Payment extends QueryBuilder{

        public $paymentStatusChanged = null;

        public function selectTeamPaymentStatus(){
            $sql = "select e.ekipa_id, e.naziv_ekipe, t.naziv_turnira, t.datum_pocetka, su.status_uplate, e.status_uplate_id
            from ekipe e
            inner join turniri t on t.turnir_id = e.turnir_id
            inner join statusi_uplata su on su.status_uplate_id = e.status_uplate_id
            where t.status_turnira_id = 1
            order by t.datum_pocetka desc, e.status_uplate_id desc, e.naziv_ekipe asc
             ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function selectPaymentStatuses(){
            $sql = "select *
                    from statusi_uplata
             ";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }

        public function updateTeamPaymentStatus($ekipaId,$statusUplateId){

            $sql = "update ekipe set status_uplate_id = {$statusUplateId} where ekipa_id = {$ekipaId} ";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();

            if($provera){
                $this->paymentStatusChanged = true;
            }else{
                $this->paymentStatusChanged = false;
            }
        }

    }

?>