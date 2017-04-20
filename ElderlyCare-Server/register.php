<?php

include_once './DbConnect.php';
function createNewUser() {
	
$data = json_decode($json);
	
$response = array();
$name = $_POST["name"];
$username = $_POST["username"];
$password =  $_POST["password"];
$mobile = $_POST["mobile"];
$addres = $_POST["address"];
$helper_id = $_POST["helper_id"];

$db = new DbConnect();

       // mysql query
        $query = "INSERT INTO helpers_detail(name,email,pwd,contact,address,patient_id) VALUES ('$name','$username','$password','$mobile','$address','$helper_id')";
        $result = mysql_query($query);
        if ($result) {
            $response["error"] = false;
			
			$response["name"] = $name;
            $response["username"] = $username;
            $response["password"] = $password;
			$response["mobile"] = $mobile;
			$response["address"] = $address;
			$response["helper_id"] = $helper_id;	
            $response["message"] = "User Registered successfully!";
        } else {
            $response["error"] = true;
            $response["message"] = "Registration Failure!";
        }
       // echo json response

    echo json_encode($response);

}
createNewUser();
?>