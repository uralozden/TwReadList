<?php include("header.php"); ?>
		
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

		<!--<div class="favbox">
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

<?php include("footer.php"); ?>
