
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="shortcut icon" href="assets/images/favicon.png"> -->
	<title>Admin - Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">
   
    <link href="<?php echo base_url();?>assets/vendor/fontawesome/css/fontawesome-all.min.css" rel="stylesheet">
    <!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/login.css">
	<link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container p-0">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-body">
			<!-- <a href="#" class="pb-2 logo"><img src="<?php echo base_url();?>assets/images/logo.png" alt="Go Dermaga"></a> -->
			<img src="<?=base_url()?>assets/images/logo/logo.png" width="370" alt="">
			<h5 class="d-flex justify-content-center"><span><b>Hj. A. Nani Nurcahyani S.ST</b></span> </h5>
			<p class="d-flex justify-content-center title"><span> System Login </span> </p>
			<?php echo form_open('login/cek_login'); ?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text dark-color"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" id="username" maxlength="20" class="form-control" placeholder="username" value="<?php echo set_value('username');?>"/>
						
					</div>
                    <?php echo form_error('username');?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text dark-color"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" id="password" maxlength="20" class="form-control" placeholder="password" value="<?php echo set_value('password');?>"/>
					</div>
                    <?php echo form_error('password');?>
                    <?php
                    if ($this->session->flashdata('f_error')){
                    ?>
                    <div style="color: rgb(255, 104, 104);margin-top: -14px;margin-bottom: 8px;text-align: center;">
                    <?php
                        echo '*'.$this->session->flashdata('f_error');
                    ?>
                    </div>
                    <?php } ?>
					<div class="row align-items-center remember">
						<input type="checkbox" onclick="showPass()">Lihat Password
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn mt-4" style="background-color: #60a306;">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Copyright@<a href="#">BidanAndalanTa</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function showPass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>