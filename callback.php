<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include ("./dbconnect.php");
if (!empty($_SESSION["reference"]) && !empty($_GET['reference'])) {
    $reference_get = $_GET['reference'];
    $reference_session = $_SESSION['reference'];
    if($reference_get !== $reference_session) {
        echo "Invalid reference";
    } else {
    $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".urlencode($reference_get),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".$_ENV['PASTACK_SECRET'],
      "Cache-Control: no-cache",
    ),
  ));
  
  $result = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $response = json_decode($result, true);
    var_dump($response['data']) ;
    $firstname = $response['data']['metadata']['first_name'];
    $middle_name = $response['data']['metadata']['middle_name'];
    $surname = $response['data']['metadata']['surname'];
    $application_number = $response['data']['metadata']['Application_number'];
    $phone_number = $response['data']['metadata']['phone_number'];
    $email = $response['data']['metadata']['email'];
    $hashpassword = $response['data']['metadata']['hashpassword'];
    $password = $response['data']['metadata']['password'];

    $validate_ref = mysqli_query($conn, "SELECT * from `payment_record` WHERE reference='$reference_session'");
    if(mysqli_num_rows($validate_ref) > 0) {
        //redirect
        echo "redirect";
    } else {
    $insert_student = "INSERT INTO `student`(`first_name`, `middlename`, `surname`, `email`, `phone_number`, `application_number`, `password`)
    VALUES ('$firstname','$middle_name','$surname','$email','$phone_number','$application_number', '$hashpassword')";
    if(mysqli_query($conn, $insert_student)) {
        $student_id = mysqli_insert_id($conn);
        $insert_payment = "INSERT INTO `payment_record`(`student_id`, `reference`, `status`) 
        VALUES ('$student_id','$reference_session','')";
        if(mysqli_query($conn, $insert_payment)) {
            $mail = new PHPMailer(true);

        try {
    
        $mail = new PHPMailer(true); 
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@aecoht.com';
            $mail->Password = 'Fmstereo@90.5'; // Replace safely
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('info@aecoht.com', 'ADEBOLA EXCELLENT COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY');
            $mail->addAddress('maoty805@gmail.com', 'Muqtar');
            $mail->isHTML(true);
            $mail->Subject = 'Application';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            } catch (Exception $e) { 
                echo 'err'. $e->getMessage();
            }
                echo "Payment Successful";
            } else {
                echo "Internal server down p";
            }
        } else {
            echo "err";
        }
    }
  } }
}else {
    exit();
}