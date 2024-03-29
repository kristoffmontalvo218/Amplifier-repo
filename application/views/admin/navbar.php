 <!-- Topbar Navbar -->
 <ul class="navbar-nav ml-auto">

     <!-- Nav Item - Alerts -->
     <li class="nav-item dropdown no-arrow mx-1">
         <a class="nav-link dropdown-toggle" href="<?php echo base_url('notifications');?>" id="alerts" role="button" aria-expanded="false">
             <i class="fas fa-bell fa-fw"></i>
             <!-- Counter - Alerts -->
             <span class="badge badge-danger badge-counter"><?php echo $this->session->userdata('notif_count'); ?></span>
         </a>
         <!-- Nav Item - Messages -->
   
         <!-- Nav Item - User Information -->
     <li class="nav-item dropdown no-arrow">
         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
             <span
                 class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('fname'); echo " "; echo $this->session->userdata('lname') ?></span>
             <img class="img-profile rounded-circle" src="<?php echo base_url( $this->session->userdata('photo')); ?>">
         </a>
         <!-- Dropdown - User Information -->
         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
             
             <a class="dropdown-item" href="<?php echo base_url('profile/'); echo $this->session->userdata('user_id'); ?>">
                 <i class="fas fa-sign-out-alt fa-user-circle fa-fw mr-2 text-gray-400"></i>
                 View Profile
             </a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 Logout
             </a>

         </div>
     </li>

 </ul>

 <?php include('logout_modal.php'); ?>
 </nav>
 <!-- End of Topbar -->