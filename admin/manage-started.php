<?php
require('checksession.php');
include '../inc/function.php';

// Handle Section Header Update
if (isset($_POST['update_header'])) {
    $header_title = mysqli_real_escape_string($conn, $_POST['header_title']);
    $header_subtitle = mysqli_real_escape_string($conn, $_POST['header_subtitle']);

    $checkH = mysqli_query($conn, "SELECT * FROM `tbl_started_header` WHERE `id` = 1");
    if (mysqli_num_rows($checkH) > 0) {
        $uQuery = mysqli_query($conn, "UPDATE `tbl_started_header` SET `title` = '$header_title', `subtitle` = '$header_subtitle' WHERE `id` = 1");
    } else {
        $uQuery = mysqli_query($conn, "INSERT INTO `tbl_started_header` (`id`, `title`, `subtitle`, `status`) VALUES (1, '$header_title', '$header_subtitle', 1)");
    }

    if ($uQuery) {
        $_SESSION['success'] = "Section Header updated successfully";
    } else {
        $_SESSION['error'] = "Failed to update header. Please try again.";
    }
    header("location:manage-started.php");
    exit;
}

// Handle Bulk Deactivate
if (isset($_POST['Deactivate']) && isset($_POST['bb'])) {
    foreach ($_POST['bb'] as $act) {
        $act = (int)$act;
        mysqli_query($conn, "UPDATE `tbl_started_milestones` SET `status` = '0' WHERE `id` = '$act'");
    }
    $_SESSION['warning'] = "Selected milestones deactivated";
    header("location:manage-started.php");
    exit;
}

// Handle Bulk Activate
if (isset($_POST['Activate']) && isset($_POST['bb'])) {
    foreach ($_POST['bb'] as $act) {
        $act = (int)$act;
        mysqli_query($conn, "UPDATE `tbl_started_milestones` SET `status` = '1' WHERE `id` = '$act'");
    }
    $_SESSION['success'] = "Selected milestones activated";
    header("location:manage-started.php");
    exit;
}

// Handle Bulk Delete
if (isset($_POST['Delete']) && isset($_POST['bb'])) {
    foreach ($_POST['bb'] as $act) {
        $act = (int)$act;
        mysqli_query($conn, "DELETE FROM `tbl_started_milestones` WHERE `id` = '$act'");
    }
    $_SESSION['warning'] = "Selected milestones deleted";
    header("location:manage-started.php");
    exit;
}

$headerDataQ = mysqli_query($conn, "SELECT * FROM `tbl_started_header` WHERE `id` = 1");
$headerData = ($headerDataQ && mysqli_num_rows($headerDataQ) > 0) ? mysqli_fetch_assoc($headerDataQ) : null;
$currentTitle = $headerData['title'] ?? 'How We Started';
$currentSubtitle = $headerData['subtitle'] ?? "From humble beginnings in 1970 to a global presence today,\r\nour journey is built on trust, quality and perseverance.";

$milestonesFetch = mysqli_query($conn, "SELECT * FROM `tbl_started_milestones` ORDER BY `sort` ASC, `id` ASC");
?>
<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>

<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<?php require('includes/header.php'); ?>
		<!-- begin #sidebar -->
		<?php require('includes/left.php'); ?>
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Home Management</a></li>
				<li class="breadcrumb-item active">How We Started</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary"><i class="fa fa-arrow-left"></i></a> Manage "How We Started" Section</h1>
			<!-- end page-header -->

			<?php if (isset($_SESSION['success'])) { ?>
				<div class="alert alert-success fade show m-b-15">
					<strong>Success!</strong> <?= $_SESSION['success']; unset($_SESSION['success']); ?>
					<span class="close" data-dismiss="alert">&times;</span>
				</div>
			<?php } ?>
			<?php if (isset($_SESSION['warning'])) { ?>
				<div class="alert alert-warning fade show m-b-15">
					<strong>Notice:</strong> <?= $_SESSION['warning']; unset($_SESSION['warning']); ?>
					<span class="close" data-dismiss="alert">&times;</span>
				</div>
			<?php } ?>
			<?php if (isset($_SESSION['error'])) { ?>
				<div class="alert alert-danger fade show m-b-15">
					<strong>Error:</strong> <?= $_SESSION['error']; unset($_SESSION['error']); ?>
					<span class="close" data-dismiss="alert">&times;</span>
				</div>
			<?php } ?>

			<!-- begin row: Section Title & Subtitle -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							</div>
							<h4 class="panel-title">1. Section Header & Subtitle</h4>
						</div>
						<div class="panel-body">
							<form method="post" action="">
								<div class="form-group row m-b-15">
									<label class="col-md-3 col-form-label font-weight-bold">Section Heading</label>
									<div class="col-md-9">
										<input type="text" name="header_title" class="form-control" value="<?= htmlspecialchars($currentTitle); ?>" required placeholder="e.g. How We Started" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-3 col-form-label font-weight-bold">Section Subtitle / Description</label>
									<div class="col-md-9">
										<textarea name="header_subtitle" class="form-control" rows="3" required placeholder="Description text"><?= htmlspecialchars($currentSubtitle); ?></textarea>
									</div>
								</div>
								<div class="form-group row m-b-0">
									<div class="col-md-9 offset-md-3">
										<button type="submit" name="update_header" class="btn btn-primary"><i class="fa fa-save"></i> Save Header Changes</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- begin row: Milestones Table -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							</div>
							<h4 class="panel-title">2. Manage Timeline Milestones</h4>
						</div>

						<form name="myform" method="post" action="">
							<div class="alert alert-secondary fade show m-0 p-3">
								<div class="btn-group btn-group-justified">
									<a href="add-started.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Milestone</a>
									<input type="submit" name="Activate" value="Activate" class="btn btn-info">
									<input type="submit" name="Deactivate" value="Deactivate" class="btn btn-warning">
									<input type="submit" name="Delete" class="btn btn-danger" value="Delete" onClick="if(confirm('Are you sure you want to delete selected milestones?')){ return true;} else { return false; }">
								</div>
							</div>

							<div class="panel-body">
								<div class="table-responsive">
									<table id="data-table-responsive" class="table table-striped table-bordered align-middle">
										<thead>
											<tr>
												<th width="1%">#</th>
												<th width="8%">Year</th>
												<th width="8%">Color</th>
												<th width="8%">Icon</th>
												<th>Description</th>
												<th width="6%">Sort</th>
												<th width="6%">Status</th>
												<th width="6%">Edit</th>
												<th width="6%">Delete</th>
												<th width="1%">
													<input type="checkbox" id="select_all">
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$count = 1;
											while ($m = mysqli_fetch_array($milestonesFetch)) {
											?>
												<tr>
													<td class="f-s-600 text-inverse"><?= $count; ?></td>
													<td style="font-weight:700; color:<?= htmlspecialchars($m['color']); ?>; font-size:16px;">
														<?= htmlspecialchars($m['year']); ?>
													</td>
													<td>
														<span style="display:inline-block; width:18px; height:18px; border-radius:50%; background:<?= htmlspecialchars($m['color']); ?>; vertical-align:middle; margin-right:5px; border:1px solid #ccc;"></span>
														<small><?= htmlspecialchars($m['color']); ?></small>
													</td>
													<td class="text-center">
														<span style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:50%; background:<?= htmlspecialchars($m['color']); ?>; color:#fff;">
															<i class="<?= htmlspecialchars($m['icon']); ?>"></i>
														</span>
													</td>
													<td><?= htmlspecialchars($m['desc']); ?></td>
													<td class="text-center font-weight-bold"><?= (int)$m['sort']; ?></td>
													<td>
														<div class="switcher">
															<input type="checkbox" onClick="updateId('<?= $m['id']; ?>')" name="switcher_checkbox_1" id="switcher_checkbox_<?= $count; ?>" <?= ($m['status'] == '1') ? 'checked' : ''; ?> value="1">
															<label for="switcher_checkbox_<?= $count; ?>"></label>
														</div>
													</td>
													<td class="text-center">
														<a href="edit-started.php?bid=<?= $m['id']; ?>" class="label label-sm label-primary" title="Edit"><i class="fa fa-edit"></i> Edit</a>
													</td>
													<td class="text-center">
														<a href="delete/started.php?bid=<?= $m['id']; ?>" onClick="if(confirm('Are you sure you want to delete this milestone?')){ return true;} else { return false; }" class="label label-sm label-danger"><i class="fa fa-trash"></i> Delete</a>
													</td>
													<td class="text-center">
														<input type="checkbox" class="checkbox" value="<?= $m['id']; ?>" name="bb[]">
													</td>
												</tr>
											<?php 
												$count++;
											} 
											?>
										</tbody>
									</table>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>

	<?php require('includes/footer.php'); ?>

	<script>
		$(document).ready(function() {
			App.init();
			TableManageResponsive.init();
		});

		function updateId(id) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "status/started.php?id=" + id, true);
			xmlhttp.send();
		}

		$(document).ready(function() {
			$('#select_all').on('click', function() {
				if (this.checked) {
					$('.checkbox').each(function() {
						this.checked = true;
					});
				} else {
					$('.checkbox').each(function() {
						this.checked = false;
					});
				}
			});

			$('.checkbox').on('click', function() {
				if ($('.checkbox:checked').length == $('.checkbox').length) {
					$('#select_all').prop('checked', true);
				} else {
					$('#select_all').prop('checked', false);
				}
			});
		});
	</script>
</body>
</html>
