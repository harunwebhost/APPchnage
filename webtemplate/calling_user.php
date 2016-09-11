<?php 
                  $logged_distric_users=logged_distric_users();
                  $district_user_id=$logged_distric_users['district_user_id'];
                  $userslist_id=$logged_distric_users['calling_id'];
      
                  
                 
 ?>
<div class="navbar-default sidebar" role="navigation">
   <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
         <li class="sidebar-search">
            <div class="input-group custom-search-form">
               <input type="text" class="form-control" placeholder="Search...">
               <span class="input-group-btn">
               <button class="btn btn-default" type="button">
               <i class="fa fa-search"></i>
               </button>
               </span>
            </div>
            <!-- /input-group -->
         </li>
         <li>
            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
         </li>
         <li>
           
           
         </li>
         <!-- 2nd menu -->
       
         <!-- 3nd menu -->
        
         <!-- 4th menu -->
        

          <li>
            <a href="#"><i class="fa fa-phone" aria-hidden="true"></i>
            Calling Leads<span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level">
               <li> <a href="calling_leads.php?show=<?php echo urlencode('Calling');?>">Assigned Calling</a> 
               </li>
               >
            </ul>
         </li>


      </ul>
   </div>
   <li class="divider"></li>
   <li><a href="../comman/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
   <!-- /.sidebar-collapse -->
</div>