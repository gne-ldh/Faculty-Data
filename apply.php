<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>

    <div class="wrapper">
        <h2>Job Application</h2>
        <p>Fill in your application details.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" class="form-control"  value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>" required >
               
            </div>    
            <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="fathersname" class="form-control"  value="<?php echo isset($_POST['fathersname']) ? $_POST['fathersname'] : '' ?>" required>
            </div>
			
			<div class="form-group">
                <label>Mother's Name</label>
                <input type="text" name="mothersname" class="form-control"  value="<?php echo isset($_POST['mothersname']) ? $_POST['mothersname'] : '' ?>" required>
            </div>
			
			<div class="form-group">
                <label>DOB</label>
                <input type="date" name="dob" class="form-control"  value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : '' ?>" required>
            </div>
			<div class="form-group">
                <label>E-Mail</label>
                <input type="email" name="email" class="form-control"  value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
            </div>
			
			<div class="form-group" >
                <label>Phone</label>
                <input type="number" name="phone" class="form-control"  value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
            </div>
			
			<div class="form-group">
                <label>Education</label>
                <input type="text" name="education" class="form-control"  value="<?php echo isset($_POST['education']) ? $_POST['education'] : '' ?>" required>
            </div>
			
			<div class="form-group">
                <label>Experience</label>
                <input type="text" name="experience" class="form-control"  value="<?php echo isset($_POST['experience']) ? $_POST['experience'] : '' ?>">
            </div>
			
			<div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control"  value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" required>
            </div>
			
			<div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control"  value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" required>
            </div>
			
			<div class="form-group">
                <label>State</label>
                <input type="text" name="state" class="form-control"  value="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>" required>
            </div>
			
			<div class="form-group">
                <label>Pincode</label>
                <input type="number" name="pincode" class="form-control"  value="<?php echo isset($_POST['pincode']) ? $_POST['pincode'] : '' ?>" required>
            </div>
			
			<div class="form-group">
                <label>Languages</label>
                <input type="text" name="languages" class="form-control"  value="<?php echo isset($_POST['languages']) ? $_POST['languages'] : '' ?>" required>
            </div>
			
			<div class="form-group">
                <label>Nationality</label>
                <input type="text" name="nationality" class="form-control"  value="<?php echo isset($_POST['nationality']) ? $_POST['nationality'] : '' ?>" required>
            </div>
			
			<div class="form-group">
                <label>Resume</label>
                <input type="file" name="resume" class="form-control">
            </div>
			
			 <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
			
		</div>
		<div class="form-group">
				<a href="interlogout.php">Logout</a>
			
		</div>
		</form>
			
			</body>
</html>




<?php
error_reporting(0);


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["resume"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["resume"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["resume"]["name"]). " has been uploaded.";
    
}


// Include config file
require_once "config2.php";

$fullname = $fathersname = $mothersname = $dob = $email = $phone = $education = $experience = $address = $city = $state = $pincode = $languages = $nationality = $resume =" ";

// prepare and bind
$sql = "INSERT INTO apply (fullname, fathersname, mothersname, dob, email, phone, education, experience, address, city, state, pincode, languages, nationality, resume ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
if($stmt = mysqli_prepare($link, $sql))
{
$stmt->bind_param("sssssssssssssss", $fullname, $fathersname, $mothersname, $dob, $email, $phone, $education, $experience, $address, $city, $state, $pincode, $languages, $nationality, $resume );

// set parameters and execute

$fullname = $_POST['fullname'];
$fathersname = $_POST['fathersname'];
$mothersname = $_POST['mothersname'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$education = $_POST['education'];
$experience = $_POST['experience'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$languages = $_POST['languages'];
$nationality = $_POST['nationality'];
$resume = $target_file;

}
if(mysqli_stmt_execute($stmt)){
echo "Applied Successfully";
}

$stmt->close();







?>

