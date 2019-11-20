<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>BULK SMS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/webroot/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/webroot/css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/webroot/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/webroot/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>/webroot/css/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>/webroot/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>/webroot/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>/webroot/css/login.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/webroot/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
    <!-- END HEAD -->

    <body class=" login">
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <?=  form_open('auth/login'); ?>
				<input type="hidden" name="_action" value="login">
                <h3 class="form-title font-green">Sign In</h3>
				<?php if (validation_errors()) : ?>
					<div class="bubt-validation-message">
						<?php echo validation_errors(); ?>
					</div>
				<?php endif; ?>
				<?php
					if(!empty($this->session->flashdata('message'))): 
						$message = $this->session->flashdata('message');
						if(!empty($message['error'])){
							echo '<div class="alert alert-danger">'.$message['error'].'</div>';
						}else{
							echo '<div class="alert alert-success">'.$message['success'].'</div>';
						}
					endif; 
				?>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input required class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" /> 
				</div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> 
				</div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                    <a href="<?php echo site_url('auth/register_view'); ?>" id="forget-password" class="forget-password">Create Account</a>
                </div>
            </form>

            <!-- END REGISTRATION FORM -->
        </div>
	<div class="copyright">BULK SMS 2018</div>
	<script src="<?php echo base_url(); ?>/webroot/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/jquery.slimscroll.min.js" type="text/javascript"></script>
	
	<script src="<?php echo base_url(); ?>/webroot/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/moment.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/app.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/webroot/js/login.min.js" type="text/javascript"></script>
</body>
</html>