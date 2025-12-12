<?php 
include './includes/head.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admission Slip</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
    @page {
        margin-top: 20px;
        margin-bottom: 20px;

    }
    body {
        font-size: 13px;
    }

    .logo img {
        width: 100px;
        border-radius: 100%;
    }

    .container {
        padding: 10px;
    }

    table th {
        width: 40%;
        font-weight: 500;
    }
    </style>
</head>

<body class="">

    <p>Download will start Now</p>
    <div id="receipt" style="display: none" class="container">

        <div id="filename" style="display: none">Bio-data Details</div>
        <!-- HEADER -->
        <div class="text-center mb-5 border p-3">
            <div class="logo">
                <img src="../img/logo/log.jpg" alt="">
            </div>
            <h4 class="fw-bold mb-0" style="color: purple">Adebola Excellent College of Health Sciences and Technology
            </h4>
            <p class="mb-0">Bode- Osi, Iwo, Ola Oluwa Local Government, Osun State, Nigeria.</p>
        </div>

        <div class="mb-3 d-flex justify-content-">

           <img src="<?php echo $student_details['passport']?>" style="width: 20%; float: right" alt="">
        </div>
        
        <div class="container border">
             
            <table class="table border-white">
                <tr>
                    <td>First Name</td>
                    <td><?= $student_details['first_name'] ?></td>
                </tr>
                <tr>
                    <td>Middle Name</td>
                    <td><?= $student_details['middlename'] ?></td>
                </tr>
                <tr>
                    <td>Surname</td>
                    <td><?= $student_details['surname'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $student_details['email'] ?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><?= $student_biodata['phone_number'] ?></td>
                </tr>
                <tr>
                    <td>NIN</td>
                    <td><?= $student_biodata['nin'] ?></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><?= $student_biodata['date_of_birth'] ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?= $student_biodata['gender'] ?></td>
                </tr>
                <tr>
                    <td>State of Origin</td>
                    <td><?= $student_biodata['stateoforigin'] ?></td>
                </tr>
                <tr>
                    <td>LGA</td>
                    <td><?= $student_biodata['lcda'] ?></td>
                </tr>
                <tr>
                    <td>Home Address</td>
                    <td><?= $student_biodata['home_address'] ?></td>
                </tr>
            </table>
        </div>

        <div class="containers mt-4"></div>
       <div class="container border">
            <?php 
            $examination_olevel = examination_olevel();
            $a = 1;
            foreach($examination_olevel as $olevel ){ ?>
            <h6>Exam Seat <?= $a++ ?></h6>
             
            <table class="table border">
                <tr>
                    <td>Reg Number</td>
                    <td><?= $olevel['olevel_reg'] ?></td>
                </tr>
                <tr>
                    <td>Exam Type</td>
                    <td><?= $olevel['olevel_type'] ?></td>
                </tr>
                <tr>
                    <td>Year</td>
                    <td><?= $olevel['olevel_year'] ?></td>
                </tr>
            </table>

            <table class="table border-white">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                $olevel_results = fetch_result($olevel['olevel_id']);
                foreach($olevel_results as $res){ 
            ?>
                    <tr>
                        <td><?= $res['subject'] ?></td>
                        <td><?= $res['grade'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>


        <div class="container border mt-5">
             <?php 
                if(!empty($student_jamb['jamb_reg'])) {
            ?>
            <h6 class="mt-4"><strong>JAMB / HND Details</strong></h6>
            <table class="table table-bordered">
                <?php 
                    $score_1 = (int)($student_jamb['score_1'] ?? 0);
                    $score_2 = (int)($student_jamb['score_2'] ?? 0);
                    $score_3 = (int)($student_jamb['score_3'] ?? 0);
                    $score_4 = (int)($student_jamb['score_4'] ?? 0);
                    ?>
                <tr>
                    <td>Jamb Registration No.</td>
                    <td><?= $student_jamb['jamb_reg'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td><?= $student_jamb['subject_1'] ?? ''?></td>
                    <td><?= $score_1 ?></td>
                </tr>
                <tr>
                    <td><?= $student_jamb['subject_2']?></td>
                    <td><?= $score_2 ?></td>
                </tr>
                <tr>
                    <td><?= $student_jamb['subject_3'] ?? ''?></td>
                    <td><?= $score_3 ?></td>
                </tr>
                <tr>
                    <td><?= $student_jamb['subject_4'] ?? ''?> </td>
                    <td><?= $score_4?></td>
                </tr>
                <tr>
                    <td><b>Total Score</b></td>
                    <td>
                    
                    <?= $score_1 + $score_2 + $score_3 + $score_4 ?>

                    </td>
                </tr>
                <?php } else {
                    echo "";
                }?>
            </table>
        </div>

        <div class="container-m5"></div>
        <div class="container border mt-5">
               <h6 class="mt-4"><strong>Next of Kin Information</strong></h6>
            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td><?= $student_biodata['nextof_name'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $student_biodata['nextof_email'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td>Relationship</td>
                    <td><?= $student_biodata['nextof_relationship'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?= $student_biodata['nextof_phonenuber'] ?? 'N/A' ?></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- SCRIPT -->
    <?php include './reciept.php'?>

</body>

</html>