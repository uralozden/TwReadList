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
	<script type="text/javascript" src="<?php echo site_url(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>js/main.js"></script>

	<meta property="og:title" content="Twitter Read List"/>
    <meta property="og:type" content="Twitter, Pocket"/>
    <meta property="og:url" content="http://twreadlist.co/"/>
    <meta property="og:image" content="http://twreadlist.co/images/facebook.jpg"/>
    <meta property="og:site_name" content="Twitter Read List"/>
    <meta property="og:description" content="TwReadList (Twitter Read List) is a simple application that transfers favorites of Twitter users to Pocket."/>

    <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-39558255-1', 'twreadlist.co');
		ga('send', 'pageview');
	</script>


</head>
<body>

	<div id="container">
		<header>
			<a href="<?php echo site_url(); ?>" class="logo">
				<img src="<?php echo site_url(); ?>images/logo.jpg" width="217px" height="34px" alt="">
			</a>

			<?php if ($this->session->userdata('username')){ ?>				
			<div id="minimal_popup">
				<a href="<?php echo site_url(); ?>api/logout" class="button">Quit</a>
				

			</div><!--minimal_popup-->
			<?php } ?>
			<div class="clear"></div>
		</header>


















