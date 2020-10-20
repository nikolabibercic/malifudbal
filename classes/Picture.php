<?php

    class Picture extends QueryBuilder{

        public $uploadPictureStatus = null;

        public function uploadPicture($picture){
            $target_dir = "images/upload/";
            $target_file = $target_dir . basename($picture["name"]) ;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                $uploadOk = 0;
                }
            
                // Check file size
                if ($picture["size"] > 10000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
            
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
                $uploadOk = 0;
                }
            
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                if (move_uploaded_file($picture["tmp_name"], $target_file)) {
                    echo "The file " . basename( $picture["name"] ) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            
            return $target_file;
            }

        public function insertPicture($picture){

            $path = $this->uploadPicture($picture);

            $sql = "insert into fotografije values(null,'{$path}',current_timestamp(),1 )";
            $query = $this->db->prepare($sql);
            $provera = $query->execute();
            //$last_id = $this->db->lastInsertId();//ako su podaci insertovani, uzima ID

            if($provera){
                $this->uploadPictureStatus = true;
            }else{
                $this->uploadPictureStatus = false;
            }
        }

        public function selectPictures(){
            //ovde selektujem samo aktivne slike
            $sql = "select * from fotografije where status_fotografije_id = 1 order by datum_inserta desc";
            $query = $this->db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $result;
        }
    }

?>