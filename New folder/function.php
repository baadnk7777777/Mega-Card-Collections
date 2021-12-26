<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'anime_card');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;
            // สร้าง dbcon ไว้เรียกใช้งาน 
            
            if(mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : ". mysqli_connect_error();
            }
        }

        public function insert($fistname, $lastname, $email, $money) {
            $result = mysqli_query($this->dbcon, "INSERT INTO users(fistname, lastname, email,
             money) VALUES('$fistname', '$lastname', '$email', '$money')");
             return $result;
        }

        public function signup ($username,	$email, $password) {
            $result = mysqli_query($this->dbcon, "INSERT INTO users(username, email, password)
                            VALUES('$username','$email', '$password')");
            return $result;
        }


        public function fetchdata () {
            $result = mysqli_query($this->dbcon, "SELECT * FROM users");
            return $result;
        }

        public function fetchdata_image () {
            $result = mysqli_query($this->dbcon, "SELECT * FROM images");
            return $result;
        }

        public function selectuser($username) {
            $result = mysqli_query($this->dbcon, "SELECT* FROM users WHERE username = '$username' ");
            return $result;
        }

        

    }

?>