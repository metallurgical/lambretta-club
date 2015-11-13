<?php $this->load->view('header_top');?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->      
<?php $this->load->view('menus');?>
<!-- =============================================== -->
<style type="text/css">
/* CSS used here will be applied after bootstrap.css */


.pagetitle {border-bottom:1px solid #cccccc; padding-bottom:30px; margin-bottom:30px;}
</style>
      <!--****** Right side column. Contains the navbar and content of the page *******************************-->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Articles
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
              <h3 class="box-title">List of articles</h3>              
              
            </div>
            <div class="box-body">
              <?php
              
              if ( isset( $articles) ) {
                //foreach ($articles as $key => $value) {
                for ($i = 0; $i < count($articles); ++$i) {
                 ?>                
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?php echo base_url('assets/uploads/files/'.$articles[$i]->article_pic_title);?>" class="img-responsive" width="200" height="200">
                  </div>
                  <div class="col-sm-9">
                    <h3 class="title"><a href="<?php echo base_url('member/viewArticles/'.$articles[$i]->article_id);?>" target="blank"><?php echo $articles[$i]->article_title;?></a></h3>
                    
                    <p><?php echo $articles[$i]->short_description;?></p>
                    
                    <p class="text-muted">Published by <span class="label label-success">Administrator</span> at <span class="badge badge-info"><?php echo $articles[$i]->article_date_created;?></span></p>
                    
                  </div>
                </div>
                <hr/> 
                <?php
                }
              }
                ?>   
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-md-12">
                  <!-- <ul class="pagination pull-right">
                    <li><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">»</a></li>
                  </ul> -->
                  <?php echo $pagination; ?>
                </div>
              </div>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<!-- All content end Here ************************************************ --> 

<!-- Footer.php -->      
<?php $this->load->view('footer');?>
<!-- =============================================== -->