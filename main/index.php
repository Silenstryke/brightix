<?php if (!defined('FLUX_ROOT')) exit; 
	if ( $eADev['enablerss'] ):
		require_once("rsslib.php");
	endif;
?>
<div class="indexpage">
	<div class="welcome-area">
		<p class="welcomeimg"><img src="<?php echo $this->themePath('img/welcome.png'); ?>" alt=""></p>
		<p class="adjust">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida porttitor sem, ac congue magna scelerisque ut. Pellentesque leo est, semper et pulvinar laoreet, venenatis ac orci. Nullam blandit mi ac erat dapibus eu pretium erat sodales. Proin tempor venenatis libero, et condimentum erat placerat eget. Nullam facilisis suscipit enim sed dapibus. Mauris aliquet scelerisque iaculis. Fusce pulvinar sem vel
		</p>
		<p class="adjust">
			mauris tincidunt fermentum. Ut non dolor congue libero tincidunt iaculis. Proin varius commodo orci, et fermentum lectus convallis sit amet. Vivamus adipiscing dui ut nulla blandit vehicula. 
		</p>
		<p>So what are you waiting for? Join us right now! <span class="download">
			<a href="<?php echo $this->url('main','download'); ?>">Click here!</a></span></p>
	</div>
	<div class="news-panel">
		<div class="news-panel-adjust">
			<div class="news-panel-1">
				<p>News</p>
				<?php
					if ( $eADev['enablerss'] ):
						echo RSS_Display($eADev['news'], 10, 0, 0, 0);
					endif;
				?>
			</div>
			<div class="news-panel-2">
				<p>Events</p>
				<?php
					if ( $eADev['enablerss'] ):
						echo RSS_Display($eADev['news'], 10, 0, 0, 0);
					endif;
				?>
			</div>
		</div>
	</div>
	<div class="itemmall">
		<ul id="my-list">
			<?php foreach( $eADev['itemmall'] as $itemmall ): $mall = explode(",", $itemmall); ?>
				<li><img src="<?php echo $this->themePath("img/mall/{$mall[0]}") ?>" title="<?php echo "Name: {$mall[1]} <br/> Cost: {$mall[2]}"; ?>" /></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
