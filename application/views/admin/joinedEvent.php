<?php $this->load->view('header_top');?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->      
<?php $this->load->view('menus');?>
<!-- =============================================== -->

      <!--****** Right side column. Contains the navbar and content of the page *******************************-->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Joined Event
            <small>Welcome to lambretta Dashboard.</small>
          </h1>     

        </section>
        <!-- end Page Header -->

<!-- All content Goes Here ************************************************ -->
        <!-- Main content -->
        <section class="content">
          <!-- Default box --> 
          <?php $this->load->view('data_messages');?>  
          
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of joined events by Members</h3>              
              
            </div>
            <div class="box-body">              
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Member Name</th>
                        <th>Member Ic</th>
                        <th>Event Title.</th>
                        <th>Description.</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Operations</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php
            $bil = 1;
            foreach($members as $key => $value){
          ?>
                      <tr>
                        <td style="width: 6%; text-align:center;"><?php echo $bil++; ?></td>
                        <td ><?php echo $value['member_name']; ?></td>
                        <td><?php echo $value['member_ic']; ?></td>
                        <td style="width: 20%;"><?php echo $value['text']; ?></td>
                        <td><?php echo $value['event_description']; ?></td>
                        <td><?php echo $value['start_date']; ?></td>
                        <td><?php echo $value['end_date']; ?></td>
                        <td style="width: 7%; text-align:center;">
                              <!-- <button class="btn btn-primary btn-xs" data-title="Edit" onclick="window.location.href='<?php echo base_url();?>admin_seat/admin_edit_bus_layout/<?php echo $value['bus_id'];?>'"><span class="glyphicon glyphicon-pencil"></span>
                              </button> -->
                            <a href="<?php echo base_url('member/deleteEvent/' . $value['event_join_id']); ?>" title="Delete Record" onclick="return confirm('Are you sure to delete this??');">
                              <button class="btn btn-danger btn-xs" data-title="Delete"><span class="glyphicon glyphicon-trash"></span>
                              </button>
                            </a>
                        </td>
                      </tr>
                    <?php } ?>  
                    </tbody>
                  </table>
                               
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<!-- All content end Here ************************************************ --> 

<!-- Footer.php -->      
<?php $this->load->view('footer');?>
<!-- =============================================== -->
<script>
  $(function () {
    $("#example1").dataTable();
  })
</script>