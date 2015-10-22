<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
    <style type="text/css">
      .colorgraph {
      height: 5px;
      border-top: 0;
      background: #c4e17f;
      border-radius: 5px;
      background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
      background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
      background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
      background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    }
    </style>  
  </head>
  <body>
    <div class="container">

    <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <?php $this->load->view('data_messages');?>
    <form role="form" action="" method="POST">
      <fieldset>
        <h2>Login to Lambretta Club.</h2>
        <hr class="colorgraph">
        <div class="form-group">
            <input type="text" name="member_username" id="member_username" class="form-control input-lg" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" name="member_password" id="member_password" class="form-control input-lg" placeholder="Password">
        </div>
        
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In" name="login">
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            Does't have account yet? Register <a href="<?php echo base_url('login/register');?>">Here</a>.
          </div>
          
        </div>
      </fieldset>
    </form>
  </div>
</div>
    <script src="<?php echo base_url();?>assets/js/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>