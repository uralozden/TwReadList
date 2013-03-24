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
		
		<section id="user">
			<h4>Welcome <span><?php echo $this->session->userdata('username'); ?>!</span></h4>
			<p>
				Please enter your Twitter username and we'll get your favorite links on Twitter and put them into your Pocket. Awesome isn’t it?
			</p>
			<form id="twitter_form" action="<?php echo site_url(); ?>api/processform" method="post">
				<p>
					<input type="text" placeholder="Twitter username without @" name="twitter_username" />
					<a href="#" onclick="$('#twitter_form').submit(); return false;">Synchronize</a>
				</p>
			</form>
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