<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include ("../dbconnect.php");
function getAllStudent() {
    global $conn;

    $get_all_student =  [];
    $student_query = mysqli_query($conn,"SELECT * from `student`");
    if(mysqli_num_rows($student_query) > 0) { 
       while($row = mysqli_fetch_array($student_query)) { 
            $get_all_student[] = $row;
       }
       return $get_all_student;
    }
    return $get_all_student;
}

function getStudent($student_id) { 
    global $conn;
    $student_id = (int)$student_id;

    $query = "SELECT * FROM `student` WHERE student_id = $student_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) { 
        $result = mysqli_fetch_assoc($result);
        return $result;
    }
    return null;
}

if(isset($_POST['register_student_admin'])) {
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $matric_number = $_POST['matric_number'];
    $email = $_POST['email'];
    
    $letters = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 5);
    $code  = rand(100, 999);
    $password = $letters . $code;
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    $insert_student = "INSERT INTO student(`surname`, `first_name`, `middlename`, `application_number`, `email`)
    VALUES('$surname', '$firstname', '$middlename', '$matric_number', '$email')";
    if(mysqli_query($conn, $insert_student)) {
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
            $mail->Subject = 'Login Credentials';
            $mail->Body    = '
            <html>
                <head>
                    <title>Account Notification</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            color: #333;
                            background-color: #f4f4f4;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        h5 {
                            color: #444;
                            font-size: 18px;
                        }
                        .notification {
                            background-color: #f7f7f7;
                            padding: 15px;
                            margin-bottom: 20px;
                            border-left: 5px solid #5cb85c;
                        }
                        .message {
                            padding: 15px;
                            background-color: #f9f9f9;
                            border: 1px solid #ddd;
                        }
                        ul {
                            list-style-type: none;
                            padding: 0;
                        }
                        li {
                            padding: 5px 0;
                        }
                        .footer {
                            text-align: center;
                            margin-top: 20px;
                            font-size: 12px;
                            color: #888;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h5>Notification: Account Created</h5>
                        <div class="notification">
                            A student account has been successfully created. Below are your login Credentials:
                        </div>

                        <div class="message">
                            <h5>Login Credentials:</h5>
                            <ul>
                                <li><strong>Username:</strong>'. $matric_number .'</li>
                                <li><strong>Password:</strong>'. $password .' <li>
                            </ul>
                        </div>

                        <div class="footer">
                            <p>Thank you for choosing our service!</p>
                            <p>For any questions, contact support@website.com</p>
                        </div>
                    </div>
                </body>
            </html>
            ';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if($mail->send()) {
                $_SESSION['alertMsg'] = true;
                $_SESSION['text'] = 'Successful create an account ! check your email for login Credentials';
                $_SESSION['title'] = 'Student Account Creation';
                $_SESSION['icon'] = 'success';
                $_SESSION['location'] = 'student';
            }
            
            } catch (Exception $e) { 
                echo 'err'. $e->getMessage();
            }
    }
}