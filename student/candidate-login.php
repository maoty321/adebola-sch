<?php 
include ("../dbconnect.php");
if(isset($_POST['student_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_user = "SELECT * FROM `student` WHERE email = '$email'";
    $result = mysqli_query($conn, $select_user);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) { 
            $_SESSION['student_id'] = $row["student_id"];
             $_SESSION['alertMsg'] = true;
            $_SESSION['text'] = 'Welcome Back '.$row['first_name'];
            $_SESSION['title'] = 'Login account';
            $_SESSION['icon'] = 'success';
            $_SESSION['location'] = 'dashboard';
        } else { 
            $_SESSION['alertMsg'] = true;
            $_SESSION['text'] = 'Invalid login Credentials';
            $_SESSION['title'] = 'Login account';
            $_SESSION['icon'] = 'error';
                $_SESSION['location'] = 'candidate-login';
        }
    } else { 
        $_SESSION['alertMsg'] = true;
        $_SESSION['text'] = 'Invalid login Credentials';
        $_SESSION['title'] = 'Login account';
        $_SESSION['icon'] = 'error';
        $_SESSION['location'] = 'candidate-login';
    }
}
?>

 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/addmission.css">
<link rel="stylesheet" href="../css/apply-addmision.css">

<body class="">
    <div class="wrapper">
        <div class="sch-box col-lg-9 col-md-9 col-sm-12">
            <div class="img-logo text-center">
                <img src="../img/logo/log.jpg" alt="">
            </div>
            <div class="sch">
                <p class="title">ADEBOLA EXCELLENT COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY</p>
                <p class="texti">Applying to ADEBOLA EXCELLENT COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY</p>
            </div>
            <hr>
        </div>

        <div class="verify-box col-md-5 p-4 col-sm-12">
            <p class="title text-center">Login to your account </p> <br>
            <form action="" method="post">
                <div class="verify-form">
                    <div class="mb-3">
                        <input type="text" name="email" placeholder="Enter your Email" id="" class="form-control">
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" placeholder="Enter your Password" id="" class="form-control">
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Login" name="student_login" class="btn "><br>
                    </div>
                    <p class="texts text-center">IF YOU HAVE VERIFIED YOUR ACCOUNT, <a href="login">CLICK HERE TO
                            PROCEED TO LOGIN</a>
            </form>
        </div>
        </p>
    </div>
    </div>
    </div>

    <?php include '../swal.php'?>
</body>

</html>