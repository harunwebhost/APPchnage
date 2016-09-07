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
            <a href="#"><i class="fa fa-info" aria-hidden="true"></i>
             Lead Information <span class="fa arrow"></span>
             </a>
          <ul class="nav nav-second-level">
               <li> <a href="upload_lead.php">Upload Leads</a> </li>
               <li> <a href="lead_info.php"> Total Leads</a> </li>
               <li> <a href="lead_info.php?show=<?php echo urlencode("assigned");?>">Assigned Leads</a> </li>
               <li> <a href="lead_info.php?show=<?php echo urlencode("un-assigned");?>">
                Un-Assinged</a> </li>

        </ul>

    </li> 
        <!-- 2nd menu -->
        
         <li>
            <a href="#"><i class="fa fa-download"> </i>
            Campains  <span class="fa arrow"></span>
             </a>
         <ul class="nav nav-second-level">
               <li> <a href="campain_leads.php?show=<?php echo urlencode('main');?>">Main Data </a> </li>
               <li> <a  href="campain_leads.php?show=<?php echo urlencode('Internal');?>"> Internal Campaign </a> </li>
               <li> <a href="campain_leads.php?show=<?php echo urlencode('Cause');?>">Cause Campaign  </a> </li>
        </ul>

    </li> 
 <!-- 3nd menu -->

   <li>
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i>
            Create Users<span class="fa arrow"></span>
             </a>
         <ul class="nav nav-second-level">
               <li> <a href="view_users.php?show=<?php echo urlencode('Users');?>">Users </a> </li>
         </ul>

    </li>

    <!-- 4th menu -->

   <li>
            <a href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i>
            District Details<span class="fa arrow"></span>
             </a>
         <ul class="nav nav-second-level">
               <li> <a href="view_districs.php?show=<?php echo urlencode('Districts');?>">Districs   </a> 
               </li>
                <li> <a href="assemblislist.php?show=<?php echo urlencode('assemblis');?>">Assemblis List</a> 
               </li>
         </ul>

    </li>

</ul>
   </div>
     <!-- /.sidebar-collapse -->

            </div>