<?php
error_reporting(0);
require_once "config2.php";

$sql = "SELECT * FROM apply";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: ". $row["id"]. " Name: " . $row["fullname"]. " Father's Name: ". $row["fathersname"]." Mother's Name: ". $row["mothersname"]." DOB: ".$row['dob']." E-mail: ".$row['email']." Phone: ".$row['phone']." Education: ".$row['education']." Experience: ".$row['experience']." Address: ".$row['address']." City: ".$row['city']." State: ".$row['state']." Pincode: ".$row['pincode']." Languages: ".$row['languages']." Nationality: ".$row['nationality']." Resume: ".$row['resume']. "<br>";
		
		$myObj->id=$row["id"];
		$myObj->fullname=$row["fullname"];
		$myObj->fathersname=$row["fathersname"];
		$myObj->mothersname=$row["mothersname"];
		$myObj->dob=$row['dob'];
		$myObj->email=$row['email'];
		$myObj->phone=$row['phone'];
		$myObj->education=$row['education'];
		$myObj->experience=$row['experience'];
		$myObj->address=$row['address'];
		$myObj->city=$row['city'];
		$myObj->state=$row['state'];
		$myObj->pincode=$row['pincode'];
		$myObj->languages=$row['languages'];
		$myObj->nationality=$row['nationality'];
		$myObj->resume=$row['resume'];
		$myJSON = json_encode($myObj);
		echo $myJSON;
		
    }
} else {
    echo "0 results";
}
$link->close();