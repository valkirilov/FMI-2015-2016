<?php
session_start();

if ( isset( $_POST ) ) {

// Read the input
$data = array();
$data['title'] = $_POST['title'];
$data['description'] = $_POST['description'];
$data['lecturerName'] = $_POST['lecturer_name'];
$data['lecturerEmail'] = $_POST['lecturer_email'];
$data['type'] = $_POST['type'];
$data['course'] = $_POST['course'];
$data['program'] = $_POST['program'];
$data['materials'] = $_FILES['add_materials']['name'][0];
$data['your_name'] = $_POST['your_name'];

$errors = validate($data);
if ($errors) {
	redirect($errors);
}

// Print the form data
echo "<strong>Title:</strong> " . $data['title'] . "<br>";
echo "<strong>Description:</strong> " . $data['description'] . "<br>";
echo "<strong>Lecturer Name:</strong> " . $data['lecturerName'] . "<br>";
echo "<strong>Lecturer Email:</strong> " . $data['lecturerEmail'] . "<br>";
echo "<strong>Type:</strong> " . $data['type'] . "<br>";
echo "<strong>Course:</strong> " . $data['course'] . "<br>";
echo "<strong>Program:</strong> " . $data['program'] . "<br>";
echo "<strong>Materials:</strong> " . $data['materials'] . "<br>";
echo "<strong>Your Name:</strong> " . $data['your_name'] . "<br>";
}

function validate($data) {
	$errors = array();
	if (empty($data['title'])) {
		$errors['title'] = "The title is mandatory!";
	}
	if (empty($data['description'])) {
		$errors['description'] = "The description is mandatory!";
	}
	if (empty($data['lecturerName'])) {
		$errors['lecturer_name'] = "The lecturer name is mandatory!";
	}
	if (!filter_var($data['lecturerEmail'], FILTER_VALIDATE_EMAIL)) {
		$errors['lecturer_email'] = "The lecturer email is invalid!";
	}
	if (empty($data['type'])) {
		$errors['type'] = "The type is mandatory!";
	}
	if (empty($data['course'])) {
		$errors['course'] = "The course is mandatory!";;
	}
	if (empty($data['program'])) {
		$errors['program'] = "The program is mandatory!";
	}
	return $errors;
}

function redirect($errors) {
	$_POST['errors'] = $errors;
	$_SESSION['post_data'] = $_POST;
	header("Location: form.php");
	exit;
}
?>