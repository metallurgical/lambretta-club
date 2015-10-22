<?php $this->load->view('header_top_CRUD');?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->      
<?php $this->load->view('menus');?>
<!-- =============================================== -->


      <!--****** Right side column. Contains the navbar and content of the page *******************************-->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?php echo $data['page_header_title'];?>
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
              <h3 class="box-title">Details Operations</h3>              
            </div>
            <div class="box-body">
              <?php echo $output; ?>
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<!-- All content end Here ************************************************ --> 






<!-- Footer.php -->      
<?php $this->load->view('footer_CRUD');?>
<!-- =============================================== -->