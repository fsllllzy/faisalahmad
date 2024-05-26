<head>
	<title>RS. Informatika</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- flipster -->
	<link rel="stylesheet" href="css/jquery.flipster.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="alert/css/alert.css" rel="stylesheet" type="text/css" media="all">
	<script src="alert/js/alert.js"></script>
	<script src="js/jquery-latest.min.js" type="text/javascript"></script>
	<script src="js/highcharts.js"></script>
	<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.gallery.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#dg-container').gallery({
				autoplay: true
			});
		});
	</script>
	<style>
		#customers {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#customers td,
		#customers th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#customers tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#customers tr:hover {
			background-color: #ddd;
		}

		#customers th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<?php include 'koneksi.php'; ?>