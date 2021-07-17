<?php
$servername = "adentxcom1.ipagemysql.com";
$username = "beemuser";
$password = "beempass";
$dbname = "beem";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
$name = $_POST['name'];
$dob=$_POST['fdob'];
$age=$_POST['age'];
$phone='255'.$_POST['fphone'];
$conditions=$_POST['disease'];
// Check connection
$sql = "INSERT INTO `details` (`Name`, `DOBirth`, `Age`, `Phone_Number`, `Conditions`) 
VALUES ('$name', '$dob','$age','$phone','$conditions')";
if (mysqli_query($conn, $sql)) {
echo "<script>alert('Your record Has been submitted. You will be notified Shortly'); window.location='covid.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
		?>
<?php 
$servername = "adentxcom1.ipagemysql.com";
$username = "beemuser";
$password = "beempass";
$dbname = "beem";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
	$query = mysqli_query($conn,"select COUNT(*) As C from details WHERE VaccineDate='0000-00-00'");
	$count=mysqli_fetch_array($query);
	if ($count['C'] >= 3) {
			$query = mysqli_query($conn,"SELECT DATE FROM `available_dates` where BOOKED = 0 AND DATE>CURRENT_DATE LIMIT 1");
			$nextDate = mysqli_fetch_array($query)['DATE'];
		$sql = "UPDATE details SET VaccineDate='".$nextDate."' WHERE VaccineDate='0000-00-00'";
if ($conn->query($sql) === TRUE) {
  $sql = "UPDATE available_dates SET BOOKED = 1 WHERE DATE='".$nextDate."'";
  if ($conn->query($sql) === TRUE) {
  

  	
  	$query = mysqli_query($conn,"SELECT * FROM `details` where VaccineDate = '".$nextDate."'");
  	$Email_Details = array();
  	while ($messages=mysqli_fetch_array($query)) {
  			$ID=$messages['ID'];
  			$Name=$messages['Name'];
  			$Phone_Number=$messages['Phone_Number'];
  			$Row = ' ID:'.$ID.'  Name: '.$Name.'  DOB: '.$messages['DOBirth'].'  Age:  '.$messages['Age'].'  Number:  '.$Phone_Number.'  Medical Conditions:  '.$messages['Conditions'].'  Vaccine Date:  '.$nextDate;
  			array_push($Email_Details, $Row);
  SendMsg($ID,$Name,$Phone_Number,$nextDate);
  	}
  	SendEmail($Email_Details);





} 
else {
  echo "Error updating record: " . $conn->error;
}
	}
}

function SendEmail ($Email_Details){
		$toEmail = "murtadarashid@gmail.com";
	$subject = 'Vaccination Registration Details';
	         $headers = "From: mohdba14@gmail.com \r\n" .
		"Reply-To: noreply@vacc.com\r\n".
		"CC: mohdba14@gmail.com\r\n". 
		"Content-Type: text/html; charset=iso-8859-1";

		$body ="Please Find the Registered Vaccine Appointment.";
		for ($i=0; $i <count($Email_Details) ; $i++) { 
		$body = $body . '<br/>'.$Email_Details[$i].'<br/>';
	}
		mail($toEmail,$subject,$body,$headers);
	
}


function SendMsg($ID,$Name,$Phone_Number,$nextDate){
			$api_key='0390eeec2f7ffd4c';
			$secret_key = 'MDM5ZGRhMTNkZmI4OTdmNzY5NjU1NGJmNWU0N2RlMTJjYWQxNTZkN2U5ZGJlMDgzZDE3YTBhOWI4N2ZkMWU4NA==';

			$postData = array(
			    'source_addr' => 'INFO',
			    'encoding'=>0,
			    'schedule_time' => '',
			    'message' => 'Hello '.$Name .', your Vaccine Appointment is on '.$nextDate.'starting 10am.',
			    'recipients' => [array('recipient_id' => $ID ,'dest_addr'=>$Phone_Number)]
			);

			$Url ='https://apisms.beem.africa/v1/send';

			$ch = curl_init($Url);
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt_array($ch, array(
			    CURLOPT_POST => TRUE,
			    CURLOPT_RETURNTRANSFER => TRUE,
			    CURLOPT_HTTPHEADER => array(
			        'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
			        'Content-Type: application/json'
			    ),
			    CURLOPT_POSTFIELDS => json_encode($postData)
			));

			$response = curl_exec($ch);

			if($response === FALSE){
			        echo $response;

			    die(curl_error($ch));
			}
			var_dump($response);
			}
?>

