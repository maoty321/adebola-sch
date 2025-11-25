<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include ("../dbconnect.php");

if (empty($_SESSION['student_id'])) {
    header("Location: ./candidate-login");
    exit();
}

$nigerian_states = [
    "Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi",
    "Bayelsa", "Benue", "Borno", "Cross River", "Delta",
    "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe",
    "Imo", "Jigawa", "Kaduna", "Kano", "Katsina",
    "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa",
    "Niger", "Ogun", "Ondo", "Osun", "Oyo",
    "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe",
    "Zamfara", "Federal Capital Territory (FCT)"
];

$combined_subjects = [
    "English Language", "Mathematics", "Civic Education", "Biology", "Chemistry", "Physics", "Economics", "Geography", "Computer Studies", "Agricultural Science",
    "Health Science", "Physical Education", "Further Mathematics", "Literature in English", "Government", "History", "Christian Religious Studies", "Islamic Religious Studies", "Visual Arts", "Music",
    "Arabic Language", "French", "Financial Accounting", "Commerce", "Office Practice", "Bookkeeping", "Marketing", "Business Studies", "Business Management", "Store Keeping",
    "Shorthand", "Typewriting", "Technical Drawing", "Building Construction", "Blocklaying, Bricklaying & Concreting", "Carpentry & Joinery", "Painting & Decorating", "Plumbing & Pipefitting", "Welding & Fabrication", "Electrical Installation",
    "Electronics", "Radio, TV & Electronics Work", "Mechanical Engineering Craft", "Auto Mechanics", "Motor Vehicle Mechanics", "Refrigeration & Air Conditioning", "Metalwork", "Basic Electricity", "Basic Electronics", "Catering Craft Practice",
    "Food & Nutrition", "Garment Making", "Fashion & Design", "Home Management", "Dyeing & Bleaching", "Data Processing", "Computer Craft Studies", "Printing Craft Practice", "Photography", "Leatherwork",
    "Ceramics", "Tourism", "Woodwork", "Auto Electrical Work", "Machine Woodworking", "General Metal Work"
];



$student_id = $_SESSION["student_id"];
$student_details = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `student` WHERE student_id = $student_id"));

$student_biodata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `student_biodata` WHERE student_id = $student_id"));


$student_jamb = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `jamb_details` WHERE student_id = $student_id"));
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

$date = date('H');
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

function examination_olevel() {
    global $student_id;
    global $conn;
    $olevel = [];
    $query = mysqli_query($conn,"SELECT * FROM `olevel_details` WHERE student_id = $student_id");
    if(mysqli_num_rows($query) > 0) { 
        while($row = mysqli_fetch_assoc($query)) {
            $olevel[] = $row;
        }
        return $olevel;
    } else {
        return $olevel;
    }
}


if(isset($_POST['student_personal_info'])) {
    $pnumber = $_POST['pnumber'];
    $nin = $_POST['nin'];
    $dob = $_POST['dob'];
    $state = $_POST['state'];
    $lcda = $_POST['lcda'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $nextof_name = $_POST['nextof_name'];
    $nextof_email = $_POST['nextof_email'];
    $nextof_relationship = $_POST['nextof_relationship'];
    $nextof_phonenuber = $_POST['nextof_phonenuber'];


    $check_student = mysqli_query($conn, "SELECT * FROM `student_biodata` WHERE student_id = $student_id");
    if (mysqli_num_rows($check_student) < 1) { 
        $insert_biodata = "INSERT INTO `student_biodata`(`student_id`, `phone_number`, `stateoforigin`, `nin`, `home_address`, 
        `date_of_birth`, `gender`, `lcda`, `nextof_name`, `nextof_email`, `nextof_relationship`, `nextof_phonenuber`)
         VALUES($student_id, '$pnumber', '$state', '$nin', '$address', '$dob', '$gender', '$lcda', '$nextof_name', '$nextof_email',
         '$nextof_relationship', '$nextof_phonenuber')";
         if(mysqli_query($conn, $insert_biodata)) {
            echo "<script>location.replace('bio-data?olevel')</script>";
         }

    } else {
        $update_student ="UPDATE `student_biodata` SET `stateoforigin`='$state',`nin`='$nin',`home_address`='$address',
        `date_of_birth`='$dob',`gender`='$gender', `phone_number` = '$pnumber', `lcda`='$lcda',`nextof_name`='$nextof_name',
        `nextof_email`='$nextof_email',`nextof_relationship`='$nextof_relationship',`nextof_phonenuber`='nextof_phonenuber'
         WHERE student_id = $student_id";
        if(mysqli_query($conn, $update_student)) {
           echo "<script>location.replace('bio-data?olevel')</script>";
        }
    }
    
}

if(isset($_POST["add_olevel_details"])) {
    $olevel_reg = $_POST['olevel_reg'];
    $olevel_type = $_POST['olevel_type'];
    $olevel_year = $_POST['olevel_year'];

    $insert_olevel_details = "INSERT INTO `olevel_details`(`student_id`, `olevel_type`, `olevel_reg`, `olevel_year`) VALUES 
    ($student_id, '$olevel_type', '$olevel_reg', '$olevel_year')";
    if(mysqli_query($conn, $insert_olevel_details)) {
        echo "
            <script>location.replace('bio-data?olevel')</script>
        ";
    }
} 

function fetch_result($olevel_id) {
    global $conn;
    $olevel_id = intval($olevel_id);
    $results = [];
    $result = mysqli_query($conn,"SELECT * FROM `olevel_result` WHERE olevel_id = $olevel_id");
    if(mysqli_num_rows( $result) > 0) { 
        while( $row = mysqli_fetch_assoc($result) ) { 
            $results[] = $row;
        }
        return $results;
    } else {
        return $result;
    }
}

if(isset($_POST['add_result_olevel'])) {
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];
    $olevel = $_POST['olevel'];

    $subjects = mysqli_query($conn, "SELECT * FROM `olevel_result` WHERE olevel_id = '$olevel'");
    if(mysqli_num_rows( $subjects) >= 9) {
        $_SESSION['alertMsg'] = true;
        $_SESSION['text'] = 'You can only upload 9 subject';
        $_SESSION['title'] = 'Olevel Upload';
        $_SESSION['icon'] = 'error';
        $_SESSION['location'] = 'bio-data?olevel';
    } else {
        $check_subject = mysqli_query($conn, "SELECT * FROM `olevel_result` WHERE  subject='$subject' AND olevel_id = '$olevel'");
        if(mysqli_num_rows( $check_subject) > 0) {
            $_SESSION['alertMsg'] = true;
            $_SESSION['text'] = 'Subject have been already been upload';
            $_SESSION['title'] = 'Olevel Upload';
            $_SESSION['icon'] = 'error';
            $_SESSION['location'] = 'bio-data?olevel';
            } else { 
            $insert_olevel = "INSERT INTO `olevel_result`(`olevel_id`, `subject`, `grade`) VALUES 
            ('$olevel', '$subject', '$grade')";
            if(mysqli_query($conn, $insert_olevel)) {
                $_SESSION['alertMsg'] = true;
                $_SESSION['text'] = 'You are successful upload the olevel subject';
                $_SESSION['title'] = 'Olevel Upload';
                $_SESSION['icon'] = 'success';
                $_SESSION['location'] = 'bio-data?olevel';
            }
        }
    }
}

if(isset($_POST['upload_jamb_details'])) {
    $jamb_reg = $_POST['jamb_reg'];
    $score_1 = $_POST['score_1'];
    $score_2 = $_POST['score_2'];
    $score_3 = $_POST['score_3'];
    $score_4 = $_POST['score_4'];
    $subject_1 = $_POST['subject_1'];
    $subject_2 = $_POST['subject_2'];
    $subject_3 = $_POST['subject_3'];
    $subject_4 = $_POST['subject_4'];

    $check_jamb = mysqli_query($conn,"SELECT * FROM `jamb_details` WHERE student_id = $student_id");
    if(mysqli_num_rows($check_jamb) > 0) {
        $update_jamb_details = "UPDATE `jamb_details` SET `jamb_reg` = '$jamb_reg', `subject_1`='$subject_1',`subject_2`='$subject_2',
        `subject_3`='$subject_3',`subject_4`='$subject_4',`score_1`='$score_1',`score_2`='$score_2',`score_3`='$score_3',`score_4`='$score_4'";
        if(mysqli_query($conn, $update_jamb_details)) {
           echo "<script>location.replace('bio-data?review_bio')</script>";
        } else {
            echo "Internal Server down";
        }
    } else {
        $insert_jamb_details = "INSERT INTO `jamb_details`(`jamb_reg`, `score_1`, `score_2`, `score_3`, `score_4`, `subject_1`, `subject_2`, `subject_3`, `subject_4`) VALUES('$jamb_reg', $score_1,
        '$score_2', '$score_3', '$score_4', '$subject_1', '$subject_2', '$subject_3', '$subject_4')";
        if(mysqli_query($conn, $insert_jamb_details)) {
           echo "<script>location.replace('bio-data?review_bio')</script>";
        }
    }
}

if(isset($_POST['final_submit'])) {
    $update = "UPDATE `student_biodata` SET status='final_submit'";
    if(mysqli_query($conn, $update)) {
        echo "<script>location.replace('dashboard')</script>";
    }
}