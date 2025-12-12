<?php
$current_page = basename($_SERVER['REQUEST_URI']);
?>

<div class="side-bar" id="side-bar">
    <ul class="menu">
        <li>
            <a href="dashboard" class="<?= ($current_page == 'dashboard') ? 'active' : '' ?>">
                <i class="ri-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <?php
           if (!isset($student_biodata['status']) || $student_biodata['status'] !== "final_submit") {
        ?>
        <li>
            <a href="bio-data"
                class="<?= ($current_page == 'bio-data' || $current_page == 'bio-data?jamb_hnd' || $current_page == 'bio-data?olevel' || $current_page =='bio-data?review_bio') ? 'active' : '' ?>">
                <i class="ri-file-list-line"></i>
                <span>Bio Data</span>
            </a>
        </li>
        <?php
            } else {
        ?>

        <li>
            <a href="#anncounment" class="<?= ($current_page == 'anncounment') ? 'active' : '' ?>">
                <i class="ri-megaphone-line"></i>

                <span>Anncounment</span>
            </a>
        </li>
        <li>
            <a href="#lecture" class="<?= ($current_page == 'lecture') ? 'active' : '' ?>">
                <i class="ri-user-voice-line"></i>

                <span>My Lecture</span>
            </a>
        </li>
        <li>
            <a href="#course" class="<?= ($current_page == 'course') ? 'active' : '' ?>">
                <i class="ri-book-open-line"></i>
                <span>Course</span>
            </a>
        </li>
        <li>
            <a href="change-password" class="<?= ($current_page == 'change-password') ? 'active' : '' ?>">
                <i class="ri-lock-password-line"></i>

                <span>Change Password</span>
            </a>
        </li>
        <li>
            <a href="printout" class="<?= ($current_page == 'printout') ? 'active' : '' ?>">
                <i class="ri-printer-line"></i>
                <span>Print-out</span>
            </a>
        </li>
       
        <?php  }?>
         <li>
            <a href="../logout" class="">
                <i class="ri-logout-box-line"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>