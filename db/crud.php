<?php
    class crud{
        //private database object\
        private $db;
        
        //constructor to initialize variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        //function to insert a new record into the attendee database
        public function insertAttendees($fname, $lname, $dob, $email, $phone, $speciality){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,phone,speciality_id) VALUES(:fname,:lname,:dob,:email,:phone,:speciality)";
                //prepare the sql statement to be execution
                $stmt = $this->db->prepare($sql);
                //bind all placheholders to the actual value
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':speciality',$speciality);
                //executed statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee($id,$fname, $lname, $dob, $email, $phone, $speciality){
            try{
                $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`phone`=:phone,`speciality_id`=:speciality WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                //bind all placheholders to the actual value
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':speciality',$speciality);
                //executed statement
                $stmt->execute();
                return true;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;

            }
            
        }

        public function getAttendees(){
            try {
                $sql = "SELECT * FROM `attendee` a inner join specialities s on a.speciality_id = s.speciality_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getAttendeeDetails($id){
            try{
                $sql = "select * from attendee  a inner join specialities s on a.speciality_id = s.speciality_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result; 
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
              
            }
        }

        public function deleteAttendee($id){
            try{
                $sql = "delete from attendee where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialities(){
            try{
                $sql = "SELECT * FROM `specialities`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

    }
?>