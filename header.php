<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
		<?php endif ?>
		<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link rel="stylesheet" href="<?php echo $this->themePath('css/styles.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php if (Flux::config('EnableReCaptcha')): ?>
		<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php endif ?>
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery-1.8.3.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery.hoverscroll.js') ?>"></script>
		<script type="text/javascript">
			$(document).ready(function() { $('#my-list').hoverscroll({ fixedArrows: true});var direction = 1, speed = 3;$("#my-list")[0].startMoving(direction, speed);	});
			$(document).ready(function(){
				$('.money-input').keyup(function() {
					var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
					if (isNaN(creditValue))
						$('.credit-input').val('?');
					else
						$('.credit-input').val(creditValue);
				}).keyup();
				$('.credit-input').keyup(function() {
					var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
					if (isNaN(moneyValue))
						$('.money-input').val('?');
					else
						$('.money-input').val(moneyValue.toFixed(2));
				}).keyup();
				processDateFields();
			});
			function reload(){
				window.location.href = '<?php echo $this->url ?>';
			}
		</script>
		<script type="text/javascript">
			function updatePreferredServer(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_server_form.preferred_server.value = preferred;
				document.preferred_server_form.submit();
			}
			var spinner = new Image();
			spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';
			function refreshSecurityCode(imgSelector){
				$(imgSelector).attr('src', spinner.src);
				var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
				var image = new Image();
				image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();
				$(imgSelector).attr('src', image.src);
			}
			function toggleSearchForm()
			{
				$('.search-form').slideToggle('fast');
			}
		</script>
		<?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
		<script type="text/javascript">
			 var RecaptchaOptions = {
			    theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
			 };
		</script>
		<?php endif ?>
	</head>
	<body>
		<?php $eADev = include('main/eADevConfig.php'); ?>
		<div id="wrapper">
			<div id="main">
				<div id="spacer">&nbsp;</div>
				<div id="navigation">
					<ul>
						<li><a href="<?php echo $this->url('main'); ?>">Home</a></li>
						<li><a href="<?php echo $eADev['forum']; ?>">Forums</a></li>
						<li><a href="<?php echo $this->url('main','downloads'); ?>">Downloads</a></li>
						<li><a href="<?php echo $this->url('account','create'); ?>"><img src="<?php echo $this->themePath('img/playnow.png'); ?>" /></a></li>
						<li><a href="<?php echo $this->url('main','info'); ?>">Information</a></li>
						<li><a href="<?php echo $this->url('main','staff'); ?>">Staff</a></li>
						<li><a href="<?php echo $this->url('vote'); ?>">Vote us</a></li>
					</ul>
					<div class="clear"></div>
				</div>
				<div id="container">
					<div class="sidebar">
						<div class="accountpanel"><?php include('main/loginpanel.php'); ?></div>
						<div class="woeSchdTable">
							<?php foreach ( $eADev['woeTime'] as $woeTime): $ewoeTime = explode( ', ', $woeTime); ?>
								<table cellspacing="0" cellpadding="0">
									<tr>
										<td class="castleName"><?php echo $ewoeTime[0]; ?></td>
										<td align="right"><?php echo $ewoeTime[1]; ?></td>
									</tr>
								</table>
							<?php endforeach; ?>
						</div>
						<div class="facebook"><?php echo '<iframe src="//www.facebook.com/plugins/likebox.php?href=' . $eADev['facebook-plugin'] . '&amp;width=210&amp;height=215&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23f5f5f5&amp;stream=false&amp;header=false&amp;appId=297165623714983" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:210px; height:190px;" allowTransparency="true"></iframe>'; ?></div>
					</div>
					<div class="content">
						<div class="content-top"></div>
						<div class="content-inner">
							<div class="content-inner-adjust">
								<?php if ($message=$session->getMessage()): ?>
									<p class="message"><?php echo htmlspecialchars($message) ?></p>
								<?php endif ?>
								<?php include 'main/submenu.php' ?>
								<?php include 'main/pagemenu.php' ?>
								<?php if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>