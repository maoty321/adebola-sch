<?php
$current_session = "2025";
$email_err = $confirm_email_err =  $phone_number_err = '';
if(isset($_POST["verify-student"])) {
    $letters = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 5);
    $code  = rand(100, 999);
    $password = $letters . $code;
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    $application_number = 'aecoht'.$current_session.rand(0, 10000000);
    $surname = $_POST["surname"];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $confirm_email  = $_POST["confirm_email"];

    if($email !== $confirm_email) {
        $confirm_email_err = "Confirm Email must match with Email";
    }

    $verify_email = mysqli_query($conn, "SELECT * FROM `student` WHERE email = '$email'");
    $verify_phone_number = mysqli_query($conn, "SELECT * FROM `student` WHERE phone_number = '$phone_number'");
    if(mysqli_num_rows($verify_email) > 0) {
        $email_err = "Email already exists";
    } 
    if(mysqli_num_rows($verify_phone_number) > 0) { 
        $phone_number_err = "Phone Number Already exists";
    }

    if(empty($email_err) && empty($phone_number_err) && empty($confirm_email_err)) { 
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
           'email' => $email,
            'amount' => "20000",
            'callback_url' => "http://localhost/project/adebola/callback",
            'metadata' => [
                "first_name" => $firstname,
                "middle_name" => $middlename,
                "surname" => $surname,
                "Application_number" => $application_number,
                "phone_number" => $phone_number,
                "email" => $email,
                "password" => $password,
                "hashpassword" => $hashpassword,
                ]
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ". $_ENV['PASTACK_SECRET'],
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute pos
        $result = curl_exec($ch);
        var_dump($result);
        if (curl_errno($ch)) {
        echo 'cURL Error: ' . curl_error($ch);
        } else {
            $response = json_decode($result, true);
            if(isset($response['status'], $response['data']['authorization_url']) && $response['status'] == true) {
            $_SESSION['reference'] = $response['data']['reference'];
            $auth_url = $response['data']['authorization_url'];
            var_dump($response);
            // Redirect the user to the authorization URL
            header("Location: $auth_url");
            exit();
        } else { 
            // Handle error gracefully
            echo "No: Unable to create authorization URL";
        }
        }

    }
}