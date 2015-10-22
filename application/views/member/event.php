<?php $this->load->view('header_top');?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->      
<?php $this->load->view('menus');?>
<!-- =============================================== -->

      <!--****** Right side column. Contains the navbar and content of the page *******************************-->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Event Calendar
            <small>Welcome to lambretta Club Member Area.</small>
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
              <h3 class="box-title"><span class="label label-danger">Double Click</span> on the date bar to view details of events.</h3>
              <?php
              /*if ( $action === "view" ) {?> 
                <a href="<?php echo base_url('member/profile/edit');?>" class="btn btn-warning"><i class="fa fa-pencil"> Update Profile</i></a>
              <?php 
              }*/ ?>
              
            </div>
            <div class="box-body"> <br/>     
            <!-- <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'> -->         
              <div id="scheduler_here" class="dhx_cal_container" style='width:100%;height:1200px'> 
                <div class="dhx_cal_navline"> 
                  <div class="dhx_cal_prev_button">&nbsp;</div> 
                  <div class="dhx_cal_next_button">&nbsp;</div> 
                  <div class="dhx_cal_today_button"></div> 
                  <div class="dhx_cal_date"></div> 
                  <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div> 
                  <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div> 
                  <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div> 
                </div> 
                <div class="dhx_cal_header"></div> 
                <div class="dhx_cal_data"></div> 
              </div>                 
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<!-- All content end Here ************************************************ --> 
<script>
  $(function () {
    // when click on join button
    // send ajax request to join that event
    $(document).on('click','.join_button', function () {
      var event_id = $( this ).parent().next('#event_id').val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url("member/joinEvent");?>',
        context : $( this ),
        data : {
          event_id : event_id
        },
        success : function ( msg ) {

          var output;
          // if joined already
          if ( msg == 1) {
            output = '<div style="border: 1px solid #800000; color : #000; background : #FFC0CB; padding : 0 3px;" id="msg">This event was joined by you already</div>';
          }
          // otherwise
          else {
            output = '<div style="border: 1px solid #A2D246; color : #000; background : #EBF8A4; padding : 0 3px; " id="msg">Successfull Sent</div>';
          }
          // remove msg div element
          $( this ).nextAll( '#msg' ).remove().end();
          // append the output into parent div
          $( this ).parent().append( output );
        }
      })
    });
  });

    scheduler.config.multi_day = true;    
    scheduler.config.xml_date="%Y-%m-%d %H:%i";
    scheduler.config.first_hour = 5;
    scheduler.config.readonly_form = true;
    scheduler.config.drag_create = false;
    scheduler.config.dblclick_create = false;
    scheduler.config.buttons_left = ["dhx_cancel_btn","join_button"];

    scheduler.locale.labels['join_button'] = "Join this event";
    scheduler.init('scheduler_here',new Date(),"month"); 
    scheduler.load("<?php echo base_url('member/viewEvent');?>");

    scheduler.config.lightbox.sections=[
        { name:"Title", height:20, map_to:"text", type:"textarea"},
        { name:"description", height:50, map_to:"event_description", type:"textarea", focus:true },
        { name:"Start Date - End Date", height:72, type:"time", map_to:"auto"}
    ];

    // when lighbox's open
    scheduler.attachEvent("onLightbox", function(id,e){
      // send ajax request to check for existing joined event
      // exist or not
      $( '.dhx_cal_light' ).append( '<input type="hidden" value="' + id + '" id="event_id">' );
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url("member/checkExistJoinEvent");?>',
        context : $( '.join_button_set' ),
        data : {
          event_id : id
        },
        success : function ( msg ) {

          var output;
          if ( msg == 1 ) {
            output = '<div style="border: 1px solid #800000; color : #000; background : #FFC0CB; padding : 0 3px;" id="msg">This event was joined by you already</div>';
            $( this ).empty();
            $( this ).append( output );
          }
          
        }
      })
    });

    var dp = new dataProcessor("<?php echo base_url('member/viewEvent');?>");    
    
    dp.init(scheduler);

    /*scheduler.attachEvent('onLightboxButton', function ( button_id, node, e ) {
      
    });*/
  
    /*scheduler.config.xml_date="%Y-%m-%d %H:%i";
    scheduler.load("<?php echo base_url('member/viewEvent');?>");*/

    /*scheduler.config.lightbox.sections=[
      { name:"User Id", height:20, map_to:"user_id", type:"textarea",default_value:""},
      { name:"Name", height:20, map_to:"name", type:"textarea",default_value:""},
      { name:"Treatment", height:20, map_to:"jenis_rawatan", type:"textarea"},
        { name:"description", height:50, map_to:"text", type:"textarea", focus:true },
        { name:"time", height:72, type:"time", map_to:"auto"}
    ];*/

    

    /*scheduler.attachEvent("onLightbox", function(id,e){
        $('div.dhx_cal_lsection:contains("User Id")').next().find('textarea').prop('readonly', true).css({'background' : '#fff', 'border': 'none'});
        $('div.dhx_cal_lsection:contains("Name")').next().find('textarea').prop('readonly', true).css({'background' : '#fff', 'border': 'none'});
        $('div.dhx_cal_lsection:contains("Treatment")').next().find('textarea').remove();

        var option = '<optgroup label="Rambut">'+
                '<option>Gunting RM10</option>'+
                '<option>Kerinting RM20</option>'+
                '<option>Melurus(iron) RM100</option>'+
                '<option>Menginai RM25</option>'+
                '<option>Merawat Rambut RM40</option>'+
                '</optgroup>'+
                '<optgroup label="Muka">'+
                '<option>Merawat jeragat, jerawat, bintik-bintik noda hitam RM50</option>'+
                '<option>Memutihkan Kulit RM30</option>'+
                '<option>Membuang Bulu Seluruh Muka(eye brow trading) RM35</option>'+
                '</optgroup>'+
                '<optgroup label="Badan">'+
                '<option>Bekam Angin dan Darah(lancet) RM25</option>'+
                '<option>Bertungku RM80</option>'+
                '<option>Urutan Tradisional RM40</option>'+
                '<option>Sauna RM10</option>'+
                '<option>Body Scrub RM25</option>'+
                '<option>Mandi Bunga RM20</option>'+
                '<option>Terapi Rendaman Kaki RM25</option>'+
                '<option>Menicare & pedicare RM45</option>'+
                '</optgroup>';
        $('<select/>').append(option).appendTo($('div.dhx_cal_lsection:contains("Treatment")').next());
        return true;
    });*/

    /*var dp = new dataProcessor("<?php echo base_url('member/viewEvent');?>"); 
    scheduler.init('scheduler_here', new Date(),"month");
    dp.init(scheduler);*/

    
  </script>
<!-- Footer.php -->      
<?php $this->load->view('footer');?>
<!-- =============================================== -->

