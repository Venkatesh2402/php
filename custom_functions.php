<?php
	include 'crud.php';
	
	if(isset($_POST['first_name'])) {
		create_user();
		die();
	}
	else if(isset($_POST['user_name']) && isset($_POST['password'])) {
		echo "here";
		retrieve_user();
	}
	function create_user() {
		$details = array(
				'user_name' => $_POST['user_name'],
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'password' => $_POST['password'],
				'phone_number' => $_POST['phone_number'],
				'address' => $_POST['address'] );
		$user_data = json_encode($details);
		$object = new services;
		$object->create($user_data);
	}
	function retrieve_user() {
		echo "in retrieve_user()";
		$usernameandpassword = $_POST['user_name'] . ":" . $_POST['password'];
		$encode = base64_encode($usernameandpassword);
		$data = array(
					'Authorization' => 'Basic ' . $encode );
		$auth = json_encode($data);
		$object = new services;
		$object->retrieve($auth);
	}
?>