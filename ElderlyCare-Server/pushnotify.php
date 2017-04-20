<?php
function sendPush()
{
$data = json_decode($json);
	
$response = array();
$username = $_POST["username"];

$db = new DbConnect();

       // mysql query
     $query = "INSERT INTO ";
     $result = mysql_query($query);


while($row = mysql_fetch_assoc($result))
{
       foreach ($row as $key=> $value)
        {
               $registrationIds=$value;
              
         }
}

// prep the bundle
$msg = array
(
	'message' 	=> 'Emergency',
);


$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);

$headers = array
(
	'Authorization: key=' .$registrationIds,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );

curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$execute = curl_exec($ch );
curl_close( $ch );
$response["message"]="Notification sent";
$response["device"]=$registrationIds;
echo json_encode($response);
}
sendPush();
?>