<?php if (!defined('FLUX_ROOT')) exit; ?>
								</div>
							</div>
							<div class="content-bottom"></div>
							<div class="clear"></div>
						</div> <!-- content end -->
						<div class="sidebar-right">
							<div class="serverstatus"><?php include('main/status.php'); ?></div>
							<div class="testimonials">
								<div class="testimonials-adjust">
									<table cellspacing="0" cellpadding="0">
										<tr>
											<td class="review">Playing this server is so much fun!
											I joined recently and I enjoy playing it
											alot. The staff is really good at there
											work</td>
										</tr>
										<tr>
											<td class="by">- Brightix</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="quicklinks">
								<ul>
									<li><a href="<?php echo $this->url('vote'); ?>"><img src="<?php echo $this->themePath('img/voteus.png'); ?>" alt=""></a></li>
									<li><a href="<?php echo $eADev['rms']; ?>"><img src="<?php echo $this->themePath('img/reviewus.png'); ?>" alt=""></a></li>
									<li><a href="<?php echo $eADev['rms']; ?>"><img src="<?php echo $this->themePath('img/reviewus2.png'); ?>" alt=""></a></li>
									<li><a href="<?php echo $this->url('donate'); ?>"><img src="<?php echo $this->themePath('img/donateus.png'); ?>" alt=""></a></li>
								</ul>
							</div>
						</div>
					<div class="clear"></div>
				</div>
				<div id="footer">
					<div class="footerinner">
						<div class="designer">
							Website Designed by<br/>
							<img src="<?php echo $this->themePath('img/designer.png'); ?>" />
						</div>
						<div class="copyright">
							Copyright &copy; 2011-12 Profound Ragnarok Online.<br/>
							All other copyrights and trademarks are property
							of Gravity, and their respective owners. 
						</div>
						<div class="coder">
							Coded by<br/>
							<a href="http://ea-dev.com" target="_blank"><img src="<?php echo $this->themePath('img/rahul.png'); ?>" title="rahuldev345<br/>http://ea-dev.com"/></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
