<?php
class DbConnect {  
        private $conn;        
        function __construct() {        
        // connecting to database
        $this->connect();
        }        
        function __destruct() {        
        $this->close();
        }        
        function connect() {        
                  
        $this->conn = mysql_connect('aa1kk9on6ht8zuq.co18xzubr35y.us-west-1.rds.amazonaws.com:3306', 'root', 'rootroot') or die(mysql_error());         
        mysql_select_db('elderly_care') or die(mysql_error());        
        // returing connection resource
        return $this->conn;
        }        
         // Close function          
        function close() {
        // close db connection
        mysql_close($this->conn);
        }
}
?>