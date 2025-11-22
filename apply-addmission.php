<?php include './includes/header.php'?>
<?php include 'php-script.php'?>
<link rel="stylesheet" href="./css/addmission.css">
<link rel="stylesheet" href="./css/apply-addmision.css">

<body class="">
    <div class="wrapper">
        <div class="sch-box col-lg-9 col-md-9 col-sm-12">
            <div class="img-logo text-center">
                <img src="./img/logo/log.jpg" alt="">
            </div>
            <div class="sch">
                <p class="title">ADEBOLA EXCELLENT COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY</p>
                <p class="texti">Applying to ADEBOLA EXCELLENT COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY</p>
            </div>
            <hr>
        </div>

        <div class="verify-box col-md-6 col-sm-12">
            <p class="title text-center">Candidate Verification</p> <br>
            <div class="verify-form">
                <form action="" method="post">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="surname" placeholder="Surname" id="" class="form-control">
                            </div>
                            <div class="col">
                                <input type="text" name="firstname" placeholder="First Name" id="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="middlename" placeholder="Middle Name" id=""
                                    class="form-control">
                            </div>

                            <div class="col">
                                <input type="email" name="email" placeholder="Email" id="" class="form-control">
                                <p class="text-danger" style="font-size: 12px"><?php echo htmlspecialchars($email_err)?></p>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="phone_number" placeholder="Phone Number" id=""
                                    class="form-control">
                                    <p class="text-danger" style="font-size: 12px"><?php echo htmlspecialchars($phone_number_err)?></p>
                            </div>
                            <div class="col">
                                <input type="email" name="confirm_email" placeholder="Confirm Email Address" id=""
                                    class="form-control">
                                    <p class="text-danger" style="font-size: 12px"><?php echo htmlspecialchars($confirm_email_err)?></p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Verify Details" name="verify-student" class="btn">
                    </div>
                </form>
                <p class="texts">IF YOU HAVE VERIFIED YOUR ACCOUNT, <a href="addmision/candidate-login">CLICK HERE TO PROCEED TO LOGIN</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>