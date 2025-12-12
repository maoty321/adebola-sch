<style>
    .nn {
         padding-top: 0px;
         gap: 1rem;
    }
    .row {
    }
    .stat {
        border: 1px solid #f5ebebff;
        box-shadow: 0px 0px 2px rgba(0, 0, 0, .1);
        padding: 10px;
        line-height: 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>
<div class="welcome-box">
    <p class="welcome-header"><?= greet_user() ?>, <?php echo $admin_details['name']?> 👋</p>
    <p>welcome to Adebola Excellent College of Health Sciences and Technology</p>
</div>

<div class="intro-box bg-white p-3 mt-3">
    <div class="intro">
        
        <p class="name"><?php echo $admin_details['name']?></p>
        <p class="dep">🎓 School Admin </p>
        <p class="dep">🏫 Adebola Excellent College of Health Sciences and Technology</p>
    </div>
    <div class="level">
        <span class="badge bg-success">Admin</span>
    </div>
</div>

<div class="containers pt-4">
    <p class=" text-muted">Dashboard Stat</p>   
    <div class="nn row g-3">
        
        <div class="d-flex stat col-md-4 col-sm-12">
           <div class="b">
             <p class="small">Total Students</p>
            <p><b>
                <?php 
                    $getAllStudent = getAllStudent();
                    echo $count_student = count($getAllStudent);;
                ?>
            </b></p>
            <p class="small">Register Student</p>
           </div>
           <div class="lf">
                <i class="ri-line-chart-line text-primary" style="font-size: 30px"></i>
           </div>
        </div>

        <div class="d-flex stat col-md-4 col-sm-12">
           <div class="b">
             <p class="small">Total Course</p>
            <p><b>
                <?php 
                    $getAllDepartments = getAllDepartments();
                    echo count($getAllDepartments);;
                ?>
            </b></p>
            <p class="small">Register Course</p>
           </div>
           <div class="lf">
                <i class="ri-book-open-line text-success" style="font-size: 30px"></i>
           </div>
        </div>

        <div class="d-flex stat col-md-3 col-sm-12">
           <div class="b">
             <p class="small">Complete  Registration</p>
            <p><b>
                <?php 
                     $student_query = mysqli_query($conn,"SELECT * from `student_biodata` WHERE status='final_submit'");
                     echo  mysqli_num_rows($student_query)
                ?>
            </b></p>
            <p class="small">Complete  Registration</p>
           </div>
           <div class="lf">
                <i class="ri-graduation-cap-line text-warning" style="font-size: 30px"></i>
           </div>
        </div>
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