<!DOCTYPE html>
<html lang="nl" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<meta charset="utf-8">
		<title>PXL Exchange</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!--[if lt IE 9]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta5)/IE9.js"></script>
		<![endif]-->

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.icon-large.min.css" type="text/css" />
		<script type="application/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
		<script type="application/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
		<style type="text/css">
			body {
				background: #eee;
			}
			.menu {
				list-style: none;
			}
			.menu li {
				float: left;
				margin-left: 5px;
			}
			.menu li a {
				display: block;
				width: 50px;
				padding: 20px;
				padding-left: 10px;
				padding-right: 10px;
				color: #d75e26;
			}
			.menu li i {
				display: block;
				margin-left: 12px;
				margin-bottom: 10px;
			}

			.menu li.active a {
				background: #ccc;
			}
			.logo-box {
				background: white;
				float: left;
				margin-top: 15px;
				padding-bottom: 0px;
				box-shadow: 0px 0px 5px #ccc;
			}
			#map_canvas {
				
				height:250px !important;
				box-shadow: 0px 0px 3px #666;			
				
			}
		</style>
	</head>
	<body>

		<div class="container">
			<div class="clearfix">
				<div class="well logo-box">
					<img src="<?php echo base_url(); ?>assets/img/logo.png" />
				</div>

				<div style="float:right; margin-top:30px;">
					<ul class="menu">
						<li class="active">
							<a href="" class="btn"><i class="icon icon-home icon-large"></i>Home</a>
						</li>
						<li>
							<a href="" class="btn"><i class="icon icon-globe icon-large"></i>Discover</a>
						</li>
						<li>
							<a href="" class="btn"><i class="icon icon-search icon-large"></i>Search</a>
						</li>
						<li>
							<a href="" class="btn"><i class="icon icon-book-open icon-large"></i>Info</a>
						</li>
						<li>
							<a href="" class="btn"><i class="icon icon-user icon-large"></i>User</a>
						</li>
					</ul>
				</div>

			</div>
		</div>
