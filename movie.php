<!DOCTYPE html>
<?php
		require './model.php';
		if (isset ( $_POST ['Search'] )) {
			$title = $_POST['search'];
		}
		else
		{
		session_start();
		if(isset ( $_SESSION ['title'] ))
		{
			$title = $_SESSION['title'];
		}
		}
		$array1 = array();
		$array2 = array();
		$array1 = $myDB->getOverviewFor($title);
		$array2 = $myDB->getReviewsFor($title);
		?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Rancid Tomatoes</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id = "rancidbanner">
			<img src="images/rancidbanner.png" alt="Rancid Tomatoes"/>
		</div>
		<h1><?php
			/*This code takes the information about the film from info.txt and displays it as a heading.*/ 
			echo $array1[0]['title']." (".$array1[0]['year'].")"; 
		?></h1>
		<div id= "overall">
			<div id= "generaloverview">
				<div>
					<img src="images/<?= $array1[0]['imagefile'] ?>" alt="general overview" />
				</div>
				<dl> 
				<dt>Director</dt>
								<dd><?= $array1[0]['director'] ?></dd>
								<dt>Year Released</dt>
								<dd><?= $array1[0]['year'] ?></dd>
								<dt>Runtime (in minutes)</dt>
								<dd><?= $array1[0]['runtime'] ?></dd>
								<dt>Box Office Total (in  millions)</dt>
								<dd>$<?= $array1[0]['boxoffice'] ?></dd>
				</dl>
			</div>
			<div id = "review">
			<div id = "reviewbanner">
			<?php
			/* This code uses an if-else statement to check whether to display fresh or rotten gif.*/
			$large_image = "";
			if($array1[0]['rating']>=60) {
				$large_image="images/freshlarge.png";
			}
			else {
				$large_image="images/rottenlarge.png";
			}
			?>
			<img src="<?=$large_image?>" alt="ReviewBannerGif"/>
			<?= $array1[0]['rating'] ?>% <!--This code gets the percentage review for the film.-->
			</div>
			<?php
			/* This code produces the several reviews by creating an array of file paths for every review
			 and then displaying the file contents. It also checks where to break the reviews into two columns.*/
			$num = $myDB->getNumberOfReviewsFor($title);
			$array2 = json_decode($array2, true);
			$half=((int)($num/2)+$num%2);
			for($i=0; $i<$num; $i++){
				if($i==$half or $i==0) { ?>
					<div class = "reviewcolumn">
				<?php } ?>
				<p>
				<?php
				if($array2[$i]['reviewrating'] == "FRESH"){ ?>
					<img src="images/fresh.gif" 
					alt="Fresh" />
					<?php
				}
				else { ?>
					<img src="images/rotten.gif" 
					alt="Rotten"/>
					<?
				}
				?>
				<q><?= $array2[$i]['review'] ?></q>
				</p>
				<p>
				<img src="images/critic.gif" 
				alt="Critic"/>
				<?=$array2[$i]['name'] ?> <br />
				<?= $array2[$i]['publication']?>
				</p>
				<?php
				if($i==($half-1) or $i==$num) { ?>
					</div>
				<?php } ?>
			<?php
			}
			?> 
			</div>
		</div>
		<div id = "footer">
			<p>(1-<?= $num ?>) of <?= $num?></p>
		</div>

		<div id= "validators">
			<img src="images/w3c-html.png" alt="Valid HTML5" /><br>
			<img src="images/w3c-css.png" alt="Valid CSS" />
		</div>
	</body>
</html>