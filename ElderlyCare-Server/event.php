<?php 
$data = json_decode($json);
	
$response = array();
$username = $_POST["username"];

$database = "elderly_care";
/* @var $firstname type */

// Create connection
$conn = mysql_connect('aa1kk9on6ht8zuq.co18xzubr35y.us-west-1.rds.amazonaws.com:3306', 'root', 'rootroot');
if (!$conn) { 
    die('Could not connect: ' . mysql_error()); 
} 
//print_r('Connected successfully <br/>'); 

//select database
mysql_select_db($database,$conn);
if(!mysql_select_db($database,$conn))
        die("Couldn't find ".$database);
 
//print_r($_POST);

//Insert the values to the database
       // mysql query
     $query = "INSERT INTO events(date,time,p_email) VALUES (CURDATE(),CURTIME(),'$username') ";
     $result = mysql_query($query);

$response["message"]="User inserted";
$response["username"]=$username;
		
echo json_encode($response);
//print_r("Query Inserted-->Check Database");

//Close connection
mysql_close($conn);


?>