<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="loginpanel">
	<?php if (!$session->isLoggedIn()): ?>      
		<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
		<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
		<div class="login_row_main">
			<div class="login_row">
				<table>
					<tr>
						<td></td><td rowspan="3"><input type="submit" value=" " class="loginBtn" /></td>
					</tr>
					<tr>
						<td><input type="text" name="username" class="textClass" placeholder="Username.." /></td><td></td>
					</tr>
					<tr>
						<td><input type="password" name="password" class="textClass" placeholder="Password.." /></td><td></td>
					</tr>
				</table>
			</div>
			<div class="login_btn">
				<p><a href="<?php echo $this->url('account','resetpass')?>">Forgot Password?</a></p>
				<p><a href="<?php echo $this->url('account','create')?>">New? Register an Account</a></p>
			</div>
		</div>
		</form>
	<?php else:?>
		<div class="logged">
			Welcome, <?php echo htmlspecialchars($session->account->userid) ?><br/><br/>
			<span class="balance-text">Donation Credits</span>
			<span class="balance-amount"><?php echo number_format((int)$session->account->balance) ?></span>
			<a href="<?php echo $this->url('account','view')?>">My Account</a>
			<a class="logout" href="<?php echo $this->url('account','logout')?>" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
		</div>
	<?php endif?>
</div>