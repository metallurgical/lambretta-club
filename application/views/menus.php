<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <?php
    if ( $this->session->userdata('user_category') === "member" ) { ?>
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url();?>assets/uploads/profile/<?php echo $this->session->userdata('user_pic');?>" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('user_username');?></p>
        <p>Email : <?php echo $this->session->userdata('user_email');?></p>
      </div>
    </div>
    <?php 
    } ?>

    <?php
    if ( $this->session->userdata('user_category') === "admin" ) { ?>
    <div class="user-panel">
      <div class="pull-left image">
        <!-- <img src="<?php echo base_url();?>assets/images/avatar04.PNG" class="img-circle" alt="User Image" /> -->
      </div>
      <div class="pull-left info">
        <p>Welcome Admin</p>
      </div>
    </div>
    <?php 
    } ?>
    
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <?php
      if ( $this->session->userdata('user_category') === "admin" ) { ?>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
        <li><a href="<?php echo base_url('admin/articles');?>"><i class="fa fa-book"></i> Articles Management</a></li>
        <li><a href="<?php echo base_url('admin/member');?>"><i class="fa fa-book"></i> Member Management</a></li>
        <li><a href="<?php echo base_url('admin/event');?>"><i class="fa fa-book"></i> Events Management</a></li>
        <li><a href="<?php echo base_url('admin/joinedEvent');?>"><i class="fa fa-book"></i> Joined Event</a></li>
        <li><a href="<?php echo base_url('login/logout');?>"><i class="fa fa-book"></i> Logout</a></li>
      <?php 
      }
      else if ( $this->session->userdata('user_category') === "member" ) { ?>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
        <li><a href="<?php echo base_url('member');?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo base_url('member/event');?>"><i class="fa fa-book"></i> Events</a></li>
        <li><a href="<?php echo base_url('member/myEvent');?>"><i class="fa fa-book"></i> My Events</a></li>
        <!-- <li><a href="<?php echo base_url('member/listArticles');?>"><i class="fa fa-book"></i> Articles</a></li> -->
      <?php 
      }
      else{ ?>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
        <li><a href="<?php echo base_url('login');?>"><i class="fa fa-book"></i> Login</a></li>
        <li><a href="<?php echo base_url('login/register');?>"><i class="fa fa-book"></i> Register</a></li>
      <?php 
      } ?>
    </ul>

  </section>
  
</aside>