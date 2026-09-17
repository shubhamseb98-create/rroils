<?php
require('checksession.php');
include '../inc/function.php';

if (isset($_POST['submit'])) {
    $year = mysqli_real_escape_string($conn, trim($_POST['year']));
    $color = mysqli_real_escape_string($conn, trim($_POST['color']));
    $icon = mysqli_real_escape_string($conn, trim($_POST['icon']));
    $desc = mysqli_real_escape_string($conn, trim($_POST['desc']));
    $sort = (int)($_POST['sort'] ?? 0);
    $status = (int)($_POST['status'] ?? 1);

    if (empty($color)) $color = '#2e7d32';
    if (empty($icon)) $icon = 'fa-solid fa-industry';

    $query = mysqli_query($conn, "INSERT INTO `tbl_started_milestones` (`year`, `color`, `icon`, `desc`, `sort`, `status`) VALUES ('$year', '$color', '$icon', '$desc', '$sort', '$status')");
    if ($query) {
        $_SESSION['success'] = "Milestone added successfully";
        header("location:manage-started.php");
        exit;
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>

<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
		<?php require("includes/header.php"); ?>
		<?php require("includes/left.php"); ?>

		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="manage-started.php">How We Started</a></li>
				<li class="breadcrumb-item active">Add Milestone</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="manage-started.php" class="btn btn-l btn-icon btn-circle btn-primary"><i class="fa fa-arrow-left"></i></a> Add New Milestone</h1>
			<!-- end page-header -->

			<?php if (isset($_SESSION['error'])) { ?>
				<div class="alert alert-danger fade show m-b-15">
					<strong>Error!</strong> <?= $_SESSION['error']; unset($_SESSION['error']); ?>
					<span class="close" data-dismiss="alert">&times;</span>
				</div>
			<?php } ?>

			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">Add Milestone Details</h4>
						</div>
						<div class="panel-body">
							<form method="post" action="" class="form-horizontal">
								<div class="form-group row m-b-15">
									<label class="col-md-3 col-form-label font-weight-bold">Year / Label <span class="text-danger">*</span></label>
									<div class="col-md-9">
										<input type="text" name="year" class="form-control" placeholder="e.g. 1970 or 2024+" required />
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-md-3 col-form-label font-weight-bold">Pin Color <span class="text-danger">*</span></label>
									<div class="col-md-9">
										<div class="input-group">
											<input type="color" id="colorPicker" value="#2e7d32" class="form-control" style="max-width:55px; height:38px; padding:2px;" oninput="document.getElementById('colorText').value = this.value">
											<input type="text" name="color" id="colorText" value="#2e7d32" class="form-control" placeholder="#2e7d32" required oninput="document.getElementById('colorPicker').value = this.value">
										</div>
										<small class="text-muted d-block mt-1">Palette suggestions: 
											<a href="javascript:;" onclick="setColor('#2e7d32')" style="color:#2e7d32; font-weight:bold;">Green</a> &bull; 
											<a href="javascript:;" onclick="setColor('#c62828')" style="color:#c62828; font-weight:bold;">Red</a> &bull; 
											<a href="javascript:;" onclick="setColor('#f57c00')" style="color:#f57c00; font-weight:bold;">Orange</a> &bull; 
											<a href="javascript:;" onclick="setColor('#a06535')" style="color:#a06535; font-weight:bold;">Brown</a> &bull; 
											<a href="javascript:;" onclick="setColor('#b71c1c')" style="color:#b71c1c; font-weight:bold;">Crimson</a>
										</small>
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-md-3 col-form-label font-weight-bold">Icon Class <span class="text-danger">*</span></label>
									<div class="col-md-9">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i id="iconPreview" class="fa-solid fa-industry"></i></span>
											</div>
											<input type="text" name="icon" id="iconInput" value="fa-solid fa-industry" class="form-control" placeholder="fa-solid fa-industry" required oninput="document.getElementById('iconPreview').className = this.value">
										</div>
										<small class="text-muted d-block mt-1">Common icons: 
											<a href="javascript:;" onclick="setIcon('fa-solid fa-industry')"><i class="fa-solid fa-industry"></i> Factory</a> &bull;
											<a href="javascript:;" onclick="setIcon('fa-solid fa-scissors')"><i class="fa-solid fa-scissors"></i> Scissors</a> &bull;
											<a href="javascript:;" onclick="setIcon('fa-solid fa-rocket')"><i class="fa-solid fa-rocket"></i> Rocket</a> &bull;
											<a href="javascript:;" onclick="setIcon('fa-solid fa-boxes-packing')"><i class="fa-solid fa-boxes-packing"></i> Packing</a> &bull;
											<a href="javascript:;" onclick="setIcon('fa-solid fa-award')"><i class="fa-solid fa-award"></i> Award</a> &bull;
											<a href="javascript:;" onclick="setIcon('fa-solid fa-robot')"><i class="fa-solid fa-robot"></i> Robot</a> &bull;
											<a href="javascript:;" onclick="setIcon('fa-solid fa-indian-rupee-sign')"><i class="fa-solid fa-indian-rupee-sign"></i> Rupee</a> &bull;
											<a href="javascript:;" onclick="setIcon('fa-solid fa-truck')"><i class="fa-solid fa-truck"></i> Truck</a>
										</small>
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-md-3 col-form-label font-weight-bold">Milestone Description <span class="text-danger">*</span></label>
									<div class="col-md-9">
										<textarea name="desc" class="form-control" rows="3" placeholder="e.g. Set up a Chana Dal Mill in Delhi" required></textarea>
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-md-3 col-form-label font-weight-bold">Sort Order</label>
									<div class="col-md-9">
										<input type="number" name="sort" class="form-control" value="13" min="0" />
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-md-3 col-form-label font-weight-bold">Status</label>
									<div class="col-md-9">
										<select name="status" class="form-control">
											<option value="1" selected>Active</option>
											<option value="0">Deactive</option>
										</select>
									</div>
								</div>

								<div class="form-group row m-b-0">
									<div class="col-md-9 offset-md-3">
										<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Milestone</button>
										<a href="manage-started.php" class="btn btn-default">Cancel</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>

	<?php require("includes/footer.php"); ?>
	<script>
		$(document).ready(function() {
			App.init();
		});

		function setColor(val) {
			document.getElementById('colorText').value = val;
			document.getElementById('colorPicker').value = val;
		}

		function setIcon(val) {
			document.getElementById('iconInput').value = val;
			document.getElementById('iconPreview').className = val;
		}
	</script>
</body>
</html>
