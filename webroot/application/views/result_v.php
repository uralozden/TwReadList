<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Syncronize Your Twitter Favorites To Pocket - TwReadList</title>
	<link rel="shortcut icon" href="<?php echo site_url(); ?>images/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="TwReadList (Twitter Read List) is a simple application that transfers your Twitter favorites to Pocket.">
	<meta name="author" content="TwReadList">
	<meta name="robots" content="all,follow">
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/reset.css">
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/global.css">

	<meta property="og:title" content="Twitter Read List"/>
    <meta property="og:type" content="Twitter, Pocket"/>
    <meta property="og:url" content="http://twreadlist.co/"/>
    <meta property="og:image" content="http://twreadlist.co/images/facebook.jpg"/>
    <meta property="og:site_name" content="Twitter Read List"/>
    <meta property="og:description" content="TwReadList (Twitter Read List) is a simple application that transfers favorites of Twitter users to Pocket."/>
</head>
<body>

	<div id="container">
		<header>
			<a href="<?php echo site_url(); ?>" class="logo">
				<img src="<?php echo site_url(); ?>images/logo.jpg" width="217px" height="34px" alt="">
			</a>
		</header>
		
		<section id="fav">
			<?php if($ok == "1"){ ?>
			<p class="ok">
				<a href="#" class="tik"></a>
				You favorite links on Twitter are posted into your Pocket!
			</p>
			<?php }else{ ?>
			<p class="ok">
				<!-- <a href="#" class="tik"></a> -->
				There is a problem, please <a style="color: #333;" href="<?php echo site_url(); ?>welcome/user">try again.</a>
			</p>
			<?php } ?>

			<div class="clear"></div>

<!-- 			<div class="favbox">
				<div class="avatar">
					<img src="<?php echo site_url(); ?>images/default_user_image.jpg" alt="">
				</div>
				<p>
					önemli olan fikir değil execution mantığı sw’nin doğasıdır... <a href="#">asdasdas</a>  ürünü çıkarın ve iyi sunum yapın! #swesk 
				</p>
			
			<div class="clear"></div>
			
			</div>-->
			
			<!-- <div class="innershadow"></div> -->

			<div class="clear"></div>

		</section>

		<footer>
			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style left">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
			<a class="addthis_button_tweet"></a>
			<a class="addthis_button_pinterest_pinit"></a>
			<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-514eaf366e1649b6"></script>
			<!-- AddThis Button END -->
			<span class="right">Copyright &copy; 2013 | TwReadList.co</span>
		</footer>
	</div><!--container-->
	
</body>
</html>