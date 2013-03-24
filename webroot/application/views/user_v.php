<?php include("header.php"); ?>

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

<?php include("footer.php"); ?>
