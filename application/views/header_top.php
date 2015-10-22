<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Lambretta Club</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url();?>assets/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<!-- 
    <link rel="stylesheet" href="<?php echo base_url('assets/codebase/dhtmlxscheduler.css');?>" type="text/css">

    <script src="<?php echo base_url('assets/codebase/dhtmlxscheduler.js');?>" type="text/javascript"></script>
 -->
  <script src="<?php echo base_url('dhtmlx/scheduler/dhtmlxscheduler.js');?>" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo base_url('dhtmlx/scheduler/dhtmlxscheduler_readonly.js');?>" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="<?php echo base_url('dhtmlx/scheduler/dhtmlxscheduler_glossy.css');?>" type="text/css" media="screen" title="no title" charset="utf-8">

  <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url();?>assets/js/jQuery-2.1.3.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <!-- Site wrapper -->
    <div class="wrapper">
       <!-- Header Top --> 

<header class="main-header">
  <a href="../../index2.html" class="logo"><b>Lambretta</b>CLUB</a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <?php
    if ( $this->session->userdata('user_category') === "member" ) { ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">              
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="<?php echo base_url();?>assets/images/avatar04.PNG" class="user-image" alt="User Image"/> -->
              <i class="fa fa-user"></i>
              Welcome
              <span class="hidden-xs"><?php echo $this->session->userdata('user_name');?></span>
            </a>
            <ul class="dropdown-menu">                  
              <li class="user-header">
                <!-- <img src="<?php echo base_url();?>assets/images/avatar04.PNG" class="img-circle" alt="User Image" /> -->
                <p>
                  <?php echo $this->session->userdata('user_name');?>
                  <small>Member since <?php echo $this->session->userdata('user_created');?></small>
                </p>
              </li>                  
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('member/profile');?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('login/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    <?php 
    } ?>
  </nav>
</header>