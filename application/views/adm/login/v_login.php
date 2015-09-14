<link rel="icon" href="favicon.ico"/>   
<link href="<?php echo base_url();?>dist/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/css/dataTables.bootstrap.css"/>
<link href="<?php echo base_url();?>dist/css/bootstrap-theme.min.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>assets/js/ie-emulation-modes-warning.js"></script>



<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <style>
            body {padding-top: 200px;}
        </style>
        <title>Web Amdin</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="<?php echo site_url('administrator/c_login');?>">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <input type="submit" name="submit" value="L o g i n" class="btn btn-lg btn-danger btn-block"/>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
