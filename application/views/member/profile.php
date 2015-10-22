<?php $this->load->view('header_top');?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->      
<?php $this->load->view('menus');?>
<!-- =============================================== -->

      <!--****** Right side column. Contains the navbar and content of the page *******************************-->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Profile
            <small>Welcome to lambretta Dashboard.</small>
          </h1>     

        </section>
        <!-- end Page Header -->

<!-- All content Goes Here ************************************************ -->
        <!-- Main content -->
        <section class="content">
          <!-- Default box --> 
          <?php $this->load->view('data_messages');?>  
          <form class="form-horizontal" role="form" action="<?php echo base_url('member/profile');?>" method="POST">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">My Details Informations</h3>
              <?php
              if ( $action === "view" ) {?> 
                <a href="<?php echo base_url('member/profile/edit');?>" class="btn btn-warning"><i class="fa fa-pencil"> Update Profile</i></a>
              <?php 
              } ?>
              
            </div>
            <div class="box-body">              
                <div class="form-group" form-group-lg>
                  <label for="Email_user" class="col-sm-2 controllabel">Name</label>
                  <div class="col-sm-4">
                  <?php
                  if ( $action === "view" ) {
                    echo $member['member_name'];
                  }
                  else {?>
                    <input type="text" name="member_name" class="form-control" id="member_name" placeholder="Email OR Username" value="<?php echo $member['member_name'];?>">
                  <?php 
                  } ?>
                  </div>
                </div>
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Ic</label>
                  <div class="col-sm-4">
                  <?php
                  if ( $action === "view" ) {
                    echo $member['member_ic'];
                  }
                  else {?>
                    <input type="text" name="member_ic" class="form-control" id="member_ic" placeholder="Password" value="<?php echo $member['member_ic'];?>">
                  <?php 
                  } ?>
                  </div>
                </div>
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Email</label>
                  <div class="col-sm-4">
                  <?php
                  if ( $action === "view" ) {
                    echo $member['member_email'];
                  }
                  else {?>
                    <input type="text" name="member_email" class="form-control" id="member_email" placeholder="Password" value="<?php echo $member['member_email'];?>">
                  <?php 
                  } ?>
                  </div>
                </div> 
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Gender</label>
                  <div class="col-sm-4">
                  <?php
                  if ( $action === "view" ) {
                    echo $member['member_gender'];
                  }
                  else {?>
                    <input type="text" name="member_gender" class="form-control" id="member_gender" placeholder="Password" value="<?php echo $member['member_gender'];?>">
                  <?php 
                  } ?>
                  </div>
                </div> 
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Address</label>
                  <div class="col-sm-4">
                  <?php
                  if ( $action === "view" ) {
                    echo $member['member_address'];
                  }
                  else {?>
                    <input type="text" name="member_address" class="form-control" id="member_address" placeholder="Password" value="<?php echo $member['member_address'];?>">
                  <?php 
                  } ?>
                  </div>
                </div> 
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Username</label>
                  <div class="col-sm-4">
                  <?php
                  if ( $action === "view" ) {
                    echo $member['member_username'];
                  }
                  else {?>
                    <input type="text" name="member_username" class="form-control" id="member_username" placeholder="Password" value="<?php echo $member['member_username'];?>">
                  <?php 
                  } ?>
                  </div>
                </div> 
                <div class="form-group" form-group-sm>
                  <label for="inputPassword" class="col-sm-2 controllabel">Password</label>
                  <div class="col-sm-4">
                  <?php
                  if ( $action === "view" ) {
                    echo $member['member_password'];
                  }
                  else {?>
                    <input type="password" name="member_password" class="form-control" id="member_password" placeholder="Password" value="<?php echo $member['member_password'];?>">
                  <?php 
                  } ?>
                  </div>
                </div>               
            </div><!-- /.box-body -->
            <div class="box-footer">
              <?php
              if ( $action === "edit" ) {?>               
                <button class="btn" type="button" onclick="javascript:window.location.href='<?php echo base_url("member/profile");?>'">Back to profile</button>
                <button class="btn btn-success" type="submit">Save Information</button>
              <?php 
              } ?>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<!-- All content end Here ************************************************ --> 

<!-- Footer.php -->      
<?php $this->load->view('footer');?>
<!-- =============================================== -->