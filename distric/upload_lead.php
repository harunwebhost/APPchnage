<?php require_once('../webtemplate/headtags.php'); ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once('../webtemplate/header_nav.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Leads</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
   

                <div class="panel panel-primary">
                    <div class="panel-heading">Upload Lead</div>
                    <div class="panel-body">
                        <div class="col-md-6 col-md-offset-2">
                            <form role="form" action="load_leads.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label>File input</label>
                                    <input type="file" name="uplaod">
                                     <p class="help-block">Upload CSV file Here</p>
                                </div>
                                  <button type="submit" class="btn btn-primary"  name="submit" id="upload_leads">Submit</button>
                            </form>
                           </div>
                        
            </div>



    <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php require_once('../webtemplate/footer.php'); ?>