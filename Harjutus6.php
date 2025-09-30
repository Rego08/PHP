<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php3</title>
</head>
<body>
    
    <div class="container mt-5">
    	<?php
		function createUserEmailAndCode($username) {
    		$username = strtolower($username);
    		$email = $username . '@hkhk.edu.ee';
    		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    		$code = '';
    		for ($i = 0; $i < 7; $i++) {
       		 	$code .= $characters[rand(0, strlen($characters) - 1)];
    		}
    		return ['email' => $email, 'code' => $code];
		}
        echo function
		?>
	</div>








    
</body>
</html>