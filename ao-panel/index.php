<?php
include("../config.php");
include("../classes/autoload.php");
?>

<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/css/admin.css">

		<script type="text/javascript" src="/assets/js/jquery-2.2.1.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="header">
			<div id="logo">
				<a href="<?=$admin_folder?>"><img src="/assets/images/Logo_Avispate_Chico_Fondo.png"></a>
			</div>
			<div id="nav">
				<?php include("includes/admin_header.php") ?>
			</div>
		</div>
		<div class="container-fluid">			
			<?php include("modules.php"); ?>
		</div>
		<div class="footer">
			<?php include("includes/admin_footer.php") ?>
		</div>
	</body>

</html>