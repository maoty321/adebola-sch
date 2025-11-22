<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$conn = mysqli_connect("localhost","root","","school_adebola");
if (mysqli_connect_errno()) { 
    die("DBerror is" . mysqli_connect_error());
}