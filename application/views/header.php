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
				box-shadow: 0px 0px 3px #666;
			}
			.input-append button.add-on {
				height: inherit !important;
			}
			.container #map_canvas {
				margin-bottom: 8px;
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
							<a href="<?php echo base_url(); ?>main/home" class="btn"><i class="icon icon-home icon-large"></i>Home</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>discover/view" class="btn"><i class="icon icon-globe icon-large"></i>Discover</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>" class="btn"><i class="icon icon-search icon-large"></i>Search</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>about/view" class="btn"><i class="icon icon-book-open icon-large"></i>Info</a>
						</li>
						<li>
							<div class="btn-group">
								<a href="<?php echo base_url(); ?>" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon icon-user icon-large"></i>User</a>

								<ul class="dropdown-menu" style="padding: 10px;">
									<form>
										<fieldset>
											<legend>
												Login
											</legend>
											<input type="text" placeholder="Username"><br/>
											<input type="password" placeholder="Password"><br/>
											<button type="submit" class="btn btn-success">
												Login
											</button><br/><hr>
											<img class="facebook" width="220" src="<?php echo base_url(); ?>assets/img/facebook.png" alt="fb_login"
										</fieldset>
									</form>
								</ul>
							</div>

					</ul>
				</div>

			</div>
		</div>
		<?php
		if (isset($map)) { echo $map['js'] . '<div class="container">' . $map['html'] . '</div>';
		}
		?>
		<?php
		if (!isset($no_div)) {
			echo '<div class="container">
<div class="well clearfix" style="background:white; margin-top:0px;">';
		}
		?>
