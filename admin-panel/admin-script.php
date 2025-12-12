<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include ("../dbconnect.php");

if(empty($_SESSION["admin_user_id"]) || empty($_SESSION["admin_fcaf"])){
    header("location: candidate-login");
    exit();
}

$admin_id = $_SESSION["admin_user_id"];
$admin_details = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `admin_school` WHERE admin_id = $admin_id"));

function getAllStudent() {
    global $conn;

    $get_all_student =  [];
    $student_query = mysqli_query($conn,"SELECT * from `student` ORDER BY `student_id` DESC");
    if(mysqli_num_rows($student_query) > 0) { 
       while($row = mysqli_fetch_array($student_query)) { 
            $get_all_student[] = $row;
       }
       return $get_all_student;
    }
    return $get_all_student;
}

function getStudent_biodata($student_id) {
    global $conn;
    $get_all_student = [];
    $student_id = (int)$student_id;
    $student_biodata = (mysqli_query($conn,"SELECT * FROM `student_biodata` WHERE student_id = $student_id"));
    if(mysqli_num_rows($student_biodata)) {
        while($row = mysqli_fetch_array($student_biodata)) {
            $get_all_student[] = $row;  
        }
        return $get_all_student;
    } else {
        return $get_all_student;
    }
}

if(isset($_GET['delte_student'])) {
    $student_id = $_GET['delte_student'];
    $delete_student = "DELETE FROM `student` WHERE `student_id` = $student_id";
    if(mysqli_query($conn, $delete_student)) {
        echo "<script>location.replace('student')</script>";
    }
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

function getAllDepartments() {
    global $conn;
    $select_department = mysqli_query($conn, "SELECT * FROM `department`");
    $departments = [];
    while ($row = mysqli_fetch_assoc($select_department)) { 
        $departments[] = $row;
    }
    return $departments;
}

function greet_user() {
    $hour = (int)date('H'); // Get current hour (0-23)

    if ($hour >= 0 && $hour < 12) {
        return 'Good Morning';
    } elseif ($hour >= 12 && $hour < 17) {
        return 'Good Afternoon';
    } elseif ($hour >= 17 && $hour < 24) {
        return 'Good Evening';
    } else {
        return 'Good Evening';
    }
}

if(isset($_POST['edit_student_admin'])) {
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $matric_number = $_POST['matric_number'];
    $department = $_POST['department'];
    $level_type = $_POST['level_type'];
    $student_id = $_POST['student_id'];

    $update = "UPDATE `student` SET `first_name`='$firstname',`surname`='$surname',
    `middlename`='$middlename', `application_number`='$matric_number',
    `department`='$department',`level_type`='$level_type' WHERE `student_id`= $student_id";
    if(mysqli_query($conn, $update)) {
        $_SESSION['alertMsg'] = true;
        $_SESSION['text'] = 'Student bio-data have been updated';
        $_SESSION['title'] = 'Update Student Data';
        $_SESSION['icon'] = 'success';
        $_SESSION['location'] = 'student';
    }
}

if(isset($_POST['register_student_admin'])) {
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $matric_number = $_POST['matric_number'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $level_type = $_POST['level_type'];
    $level = $_POST['level'];
    
    $letters = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 5);
    $code  = rand(100, 999);
    $password = $letters . $code;
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    $check_student = mysqli_query($conn, "SELECT * FROM `student` WHERE email = '$email' OR application_number = '$matric_number'");
    if(mysqli_num_rows($check_student) > 0) {
                $_SESSION['alertMsg'] = true;
                $_SESSION['text'] = 'Student Already have an account';
                $_SESSION['title'] = 'Account creation';
                $_SESSION['icon'] = 'error';
                $_SESSION['location'] = 'student';
    }  else {
    $insert_student = "INSERT INTO student(`surname`, `first_name`, `middlename`, `application_number`, `email`, `level`, `role`, `password`, `department`, `level_type`, `super_view`)
    VALUES('$surname', '$firstname', '$middlename', '$matric_number', '$email', '$level', 'student', '$hashpassword', '$department', '$level_type', '$password')";
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
            $mail->addAddress($email, 'Muqtar');
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
                                <li><strong>Email:</strong>'. $email .'</li>
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
}}