<?php
	
	/*$object1 = new services ;
    $details = array(
				'user_name' => 'example@gmail.com',
				'first_name' => 'test',
				'last_name' => '456',
				'password' => '123123123',
				'phone_number' => '1111111111',
				'address' => '222B,Baker Street' );
	$user_data = json_encode($details);
	$object1->create_user($user_data);*/
	class services {
		
		function retrieve($auth) {
			$curl = curl_init();

			curl_setopt_array($curl, array(
						CURLOPT_PORT => "8080",
  CURLOPT_URL => "http://localhost:8080/web_service/myresource/login",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic dGVzdCswMDJAZ21haWwuY29tOjIyMjIyMjIyMjI="

  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
		}
		
		function create($details) {
			$url = "http://localhost:8080/web_service/myresource/create";
			$create = curl_init($url);
			curl_setopt($create, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
			curl_setopt($create, CURLOPT_URL, $url);
			curl_setopt($create, CURLOPT_POST, true);
			curl_setopt($create, CURLOPT_RETURNTRANSFER, true);
			//curl_setopt($user, CURLOPT_HTTPHEADER, $auth);		
			curl_setopt($create, CURLOPT_POSTFIELDS, $details);
			print_r($result = curl_exec($create));
			
			$create_status = curl_getinfo($create, CURLINFO_HTTP_CODE);
			echo $create_status;
			
						
			curl_close($create);
			
		}
		
		function update($pin_details, $auth){
			print_r($pin_details);
			$url = "http://192.168.10.112:8080/test003/webapi/update";
			$update = curl_init($url);
			curl_setopt($update, CURLOPT_HTTPHEADER, array("Authorization: $auth", "Content-type: application/json"));
			curl_setopt($update, CURLOPT_URL, $url);
			//curl_setopt($update, CURLOPT_POST, true);
			curl_setopt($update, CURLOPT_CUSTOMREQUEST, 'PATCH');
			curl_setopt($update, CURLOPT_POSTFIELDS, $pin_details);
			curl_setopt($update, CURLOPT_RETURNTRANSFER, true);	
			$after_patch = curl_exec($update);
			$status = curl_getinfo($update, CURLINFO_HTTP_CODE);
			
			print_r($after_patch);
			echo $status;
			
			curl_close($update);
			
		}
	}

 ?>
	