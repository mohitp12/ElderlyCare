<?php

include_once './DbConnect.php';
function createNewUser() {
	
$data = json_decode($json);
	
$response = array();

$username = $_POST["username"];
$password =  $_POST["password"];

$db = new DbConnect();

       // mysql query
        $query = "SELECT * FROM patients_detail WHERE email='$username' AND pwd='$password' LIMIT 1";
        $result = mysql_query($query);
        if ($result) {
            $response["error"] = false;
			
			$response["username"] = $username;
           
			
            $response["message"] = "User login successfully!";
        } else {
            $response["error"] = true;
            $response["message"] = "Login Failure!";
        }
       // echo json response

    echo json_encode($response);

}
createNewUser();
?>