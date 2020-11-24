

<!DOCTYPE html>

<html>



<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Admin Login</title>

  <!-- Core CSS - Include with every page -->

  <link href="<?php echo base_url()?>assets/back/plugins/bootstrap/bootstrap.css" rel="stylesheet" />

  <link href="<?php echo base_url()?>assets/back/font-awesome/css/font-awesome.css" rel="stylesheet" />

  <link href="<?php echo base_url()?>assets/back/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />

  <link href="<?php echo base_url()?>assets/back/css/style.css" rel="stylesheet" />

  <link href="<?php echo base_url()?>assets/back/css/main-style.css" rel="stylesheet" />



</head>



<body class="body-Login-back">



    <div class="container">



        <div class="row">

            

          <div class="col-md-4 col-md-offset-4">

            <div class="panel panel-default border-r">                  

                <div class="panel-heading back-g rounded-top">
                    <h1>Welcome!</h1>

                      <p class="text-success"> 

                     <?php

                          if(isset($success_message)){

                         echo $success_message;

                     }?>

                     </p>

                    <h3 class="panel-title">Please Sign In</h3>

                    <p class="text-danger"> 

                     <?php

                          if(isset($error_message)){

                         echo $error_message;

                     }?>

             </p>

         </div>

         <div class="panel-body p-t-b">

            <form role="form" action="<?php echo base_url();?>Home/checklogin" method="post">

                <fieldset>

                    <div class="form-group">

                        <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>

                    </div>

                    <div class="form-group">

                        <input class="form-control" placeholder="Password" name="user_password" type="password" value="">

                    </div>

                    <div class="checkbox">

                        <label>

                            <input name="remember" type="checkbox" value="Remember Me">Remember Me

                        </label>

                    </div>

                    <button class="btn btn-lg btn-success btn-block" name="remember" type="checkbox" value="Remember Me">Login</button>

                </fieldset>

            </form>

        </div>

    </div>

</div>

</div>

</div>

<!-- Core Scripts - Include with every page -->

<script src="<?php echo base_url()?>assets/back/plugins/jquery-1.10.2.js"></script>

<script src="<?php echo base_url()?>assets/back/plugins/bootstrap/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/back/plugins/metisMenu/jquery.metisMenu.js"></script>



</body>

</html>

