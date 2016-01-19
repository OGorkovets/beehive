<?php require_once "record.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				<?php if ($msg && $msg != "") {echo "<div class='msg'>$msg</div>";}?>
				<form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="hive-form">
					<label for="hname">Hive Name:</label>
					<input type="text" name="hname" id="hname" required autocomplete="off">

					<label for="observdate">Observation Date:</label>
					<input type="date" name="observdate" id="observdate" required autocomplete="off">

					<label for="duration">Duration of Observation (in days):</label>
					<input type="number" name="duration" min="0" id="duration" required autocomplete="off">

					<label for="mitecount">Mite Count (a non-negative number):</label>
					<input type="number" min="0" name="mitecount" id="mitecount" required autocomplete="off">

					<input type="submit" name="submit" value="Save">
				</form>
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