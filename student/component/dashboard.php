<div class="welcome-box">
    <p class="welcome-header"><?php echo greet_user() . ', '. $student_details['first_name']  ?>  👋</p>
    <p>welcome to Adebola Excellent College of Health Sciences and Technology</p>
</div>

<div class="intro-box bg-white p-3 mt-3">
    <div class="intro">
        <p class="name"><?php echo $student_details['first_name'].' '.$student_details['middlename'].' '.$student_details['surname']. ''?></p>
        <p class="dep">🎓 <?php echo $student_details['department']?> | <?php echo $student_details['application_number']?></p>
        <p class="dep">🏫 Adebola Excellent College of Health Sciences and Technology</p>
    </div>
    <div class="level">
        <span class="badge bg-success">Applicant</span>
    </div>
</div>

<div class="container">
    <div class="row gx-3">
        <div class="ann col-lg-8 col-md-8 col-sm-12 bg-white">
            <span><b>📢 Announment</b></span>
            <div class="ann-body">
                <span class="ann-text"> <i class="ri-volume-off-vibrate-line"></i> No Announcement</span>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">

        </div>
    </div>
</div>