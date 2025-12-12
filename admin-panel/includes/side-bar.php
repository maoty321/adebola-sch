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
         <li>
             <a href="student" class="<?= ($current_page == 'student') ? 'active' : '' ?>">
                 <i class="ri-file-list-line"></i>
                 <span>Manage-Student</span>
             </a>
         </li> 
          <li>
            <a href="./logout" class="">
                <i class="ri-logout-box-line"></i>
                <span>Logout</span>
            </a>
        </li>
     </ul>
 </div>