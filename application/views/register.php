<?php $this->load->view('header_top');?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->      
<?php $this->load->view('menus');?>
<!-- =============================================== -->

      <!--****** Right side column. Contains the navbar and content of the page *******************************-->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Register Account
            <small>Be one of Us</small>
          </h1>     

        </section>
        <!-- end Page Header -->

<!-- All content Goes Here ************************************************ -->
        <!-- Main content -->
        <section class="content">
          <!-- Default box --> 
          <?php $this->load->view('data_messages');?>  
          <form class="form-horizontal" role="form" action="<?php echo base_url('login/register');?>" method="POST" enctype="multipart/form-data">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Fill in Your Informations</h3>
              
            </div>
            <div class="box-body">              
                <div class="form-group" form-group-lg>
                  <label for="Email_user" class="col-sm-2 controllabel">Name</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_name" class="form-control" id="member_name" placeholder="Email OR Username">
                  </div>
                </div>
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Ic</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_ic" class="form-control" id="member_ic" placeholder="Password">
                  </div>
                </div>
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Email</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_email" class="form-control" id="member_email" placeholder="Password">
                  </div>
                </div> 
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Gender</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_gender" class="form-control" id="member_gender" placeholder="Password">
                  </div>
                </div> 
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Address</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_address" class="form-control" id="member_address" placeholder="Password">
                  </div>
                </div> 
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Phone</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_phone" class="form-control" id="member_phone" placeholder="Phone">
                  </div>
                </div>
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Type of lambretta</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_type_of_lambretta" class="form-control" id="member_type_of_lambretta">
                  </div>
                </div>
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Plate No</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_plate_no" class="form-control" id="member_plate_no">
                  </div>
                </div>
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Married</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_married" class="form-control" id="member_married">
                  </div>
                </div>
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Profile Pic</label>
                  <div class="col-sm-4">
                    <input type="file" name="member_pic" class="form-control" id="member_pic">
                  </div>
                </div>
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Username</label>
                  <div class="col-sm-4">
                    <input type="text" name="member_username" class="form-control" id="member_username" placeholder="Password">
                  </div>
                </div> 
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Password</label>
                  <div class="col-sm-4">
                    <input type="password" name="member_password" class="form-control" id="member_password" placeholder="Password">
                  </div>
                </div>               
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button class="btn btn-success" type="submit">Register Now</button>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<!-- All content end Here ************************************************ --> 

<!-- Footer.php -->      
<?php $this->load->view('footer');?>
<!-- =============================================== -->