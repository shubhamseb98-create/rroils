<?php
ob_start();

$sessionPath = __DIR__ . '/../sessions';
if (!is_dir($sessionPath)) {
    @mkdir($sessionPath, 0755, true);
}
session_save_path($sessionPath);
session_start();

if(isset($_SESSION['admin_ses']) && $_SESSION['admin_ses'] == 'hvrs@#p9w84r'.session_id())
{
    header("location:index.php");
    exit;
}
require('../inc/function.php');

if(isset($_POST['login']))
{
  $email = mysqli_real_escape_string($conn,$_POST['username']); 
  $pass = mysqli_real_escape_string($conn,$_POST['password']); 
  $pass = md5($pass);
  $data=mysqli_query($conn,"SELECT * FROM `tbl_admin` WHERE `username`='$email' && `password`='$pass'");
  $rec=mysqli_num_rows($data);
  if($rec==true)
  {
    $_SESSION['admin_ses']="hvrs@#p9w84r".session_id();
    $_SESSION['admin_email']=$email;
    $_SESSION['success']="You Are Successfully login";
    header('location:index.php');
    exit;
  }
  else
  {
    $_SESSION['error']="Invalid Username or Password.";    
  }
}

$sqqll ="SELECT `pro_id`, `pro_logo`,`pro_dark_logo`, `pro_favicon` , `pro_title`, `pro_keyword`, `pro_detail` FROM `tbl_profile`";
$resulltt = $conn->query($sqqll);
$rowww = $resulltt->fetch_assoc();
?> 
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> Signin | <?=$rowww['pro_title']?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet" />
	<link href="assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="assets/css/default/style.min.css" rel="stylesheet" />
	<link href="assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<script src="assets/plugins/pace/pace.min.js"></script>
    <link rel="shortcut icon" href="<?= SITE_URL ?>uploads/<?=$rowww['pro_favicon']?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/toaster/toaster.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/toaster/toaster.css"> 
</head>
<body class="pace-top">
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<div id="page-container" class="fade">
		<div class="login bg-black animated fadeInDown">
			<div class="login-header">
				<div class="brand">
                    <img src="../uploads/<?php echo $rowww['pro_favicon'];?>" width="20%"/>
				</div>
				<div class="icon">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			  <div class="login-content" style="background-color: white;">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="margin-bottom-0">
					<div class="form-group m-b-20">
						<input type="text" class="form-control form-control-lg inverse-mode" name="username" placeholder="Username" required />
					</div>
					<div class="form-group m-b-20">
						<input type="password" class="form-control form-control-lg inverse-mode" name="password" placeholder="Password" required />
					</div>
					<div class="login-buttons">
						<button type="submit" name="login" class="btn btn-block btn-lg" style="background:#015fc9; color:white">Sign me in</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="assets/js/theme/default.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
    <script type="text/javascript">
		<?php if(isset($_SESSION['success'])){ ?>
		  $.toast({
				text: '<?php echo $_SESSION['success']; ?>',
				heading: 'Success',
				showHideTransition: 'slide',
				icon: 'success'
			});
		<?php } unset($_SESSION['success']); ?>	
		<?php if(isset($_SESSION['error'])) { ?>	
			  $.toast({
					text: '<?php echo $_SESSION['error']; ?>',
					heading: 'Ooh Snapp..',
					showHideTransition: 'slide',
					icon: 'error'
				});
		<?php } unset($_SESSION['error']); ?>	
   </script>
</body>
</html>