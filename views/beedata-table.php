<?php require_once "record.php";?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<meta name="viewport" charset="UTF-8" content="width=device-width, initial-scale=1.0">
	<title><?=$title;?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h1>BEEHIVE</h1>
					</div>
					<div class="col-md-4">
						<div class="logo-wrap">
							<a href="/" class="logo">
								<img src="img/logo.png" height="108" width="120" alt="logo">
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<nav class="top-mnu">
							<ul>
								<li><a href="/" <?php if ($_SERVER['PHP_SELF'] == '/' || $_SERVER['PHP_SELF'] == '/index.php') echo "class='active'";?>>Home</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="contacts.php" <?php if ($_SERVER['PHP_SELF'] == 'contacts.php') echo "class='active'";?>>Contacts</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<section id="top-section">
			<div class="container">
				<div class="sc-top">
					<img src="img/imgbee.jpg" alt="img">
				</div>
			</div>
		</section>
		<div class="container">
			<section id="content">
				<h3 id="tableName">This table represents data collected from beekeepers</h3>
				<table id="beeTable" class="table table-bordered table-hover table-condensed" >
					<thead>
					   <th># </th>
					   <th>HIVE NAME</th>
					   <th>OSERVATION DATE</th>
					   <th>DURATION(days)</th>
					   <th>MITES COUNT</th>
					</thead>  
				 <?php
					  $count = 0;
					  foreach ($obsList as $row): ?>
                  <tr>
					  <td><?php echo $count += 1; ?></td>
                      <td><?php echo $row['hive_name']; ?></td>
                      <td><?php echo $row['observation_date']; ?></td>
                      <td><?php echo $row['duration']; ?></td>
                      <td><?php echo $row['mite_count']; ?></td>        
                 </tr>        
				<?php endforeach; ?>
			  </table>
					<div id="download" class="col-md-3">
						<a href="/IT328/beehive/ExpToExcel/toexcel.php?id=all" class="downl">Download table in Excel file</a>
							
					</div>
					<script>
						$(document).ready(function(){						
						});		
					</script>
							
			</section>
		</div>
		<div class="container">
			<footer id="footer">
				<div class="row">
					<div class="col-md-4">
						<a href="/">
							<img src="img/logo.png" width="60" alt="logo">
							<h1>BEEHIVE</h1>
						</a>
					</div>
					<div class="col-md-6">
						<span>&copy; <?=date('Y');?>. All rights reserved</span>
					</div>
					<div class="col-md-2">
						<div class="social-wrap">
							<ul>
								<li><a href="" class="fa fa-facebook"></a></li>
								<li><a href="" class="fa fa-google-plus"></a></li>
								<li><a href="" class="fa fa-twitter"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>
</html>