<?php if (!defined('FLUX_ROOT')) exit; 
$cache = FLUX_DATA_DIR.'/tmp/ServerStatus.cache';

if (file_exists($cache) && (time() - filemtime($cache)) < (Flux::config('ServerStatusCache') * 600)) {
    $serverStatus = unserialize(file_get_contents($cache));
}
else {
    $serverStatus = array();
    foreach (Flux::$loginAthenaGroupRegistry as $groupName => $loginAthenaGroup) {
        if (!array_key_exists($groupName, $serverStatus)) {
            $serverStatus[$groupName] = array();
        }

        $loginServerUp = $loginAthenaGroup->loginServer->isUp();

        foreach ($loginAthenaGroup->athenaServers as $athenaServer) {
            $serverName = $athenaServer->serverName;

            $sql = "SELECT COUNT(char_id) AS players_online FROM {$athenaServer->charMapDatabase}.char WHERE online > 0";
            $sth = $loginAthenaGroup->connection->getStatement($sql);
            $sth->execute();
            $res = $sth->fetch();

            $serverStatus[$groupName][$serverName] = array(
                'loginServerUp' => $loginServerUp,
                'charServerUp' => $athenaServer->charServer->isUp(),
                'mapServerUp' => $athenaServer->mapServer->isUp(),
                'playersOnline' => intval($res ? $res->players_online : 0)
            );
        }
    }
    
    $fp = fopen($cache, 'w');
    if (is_resource($fp)) {
        fwrite($fp, serialize($serverStatus));
        fclose($fp);
    }
}
$online = "<img src=" . $this->themePath('img/online.png') . " />";
$offline = "<img src=" . $this->themePath('img/offline.png') . " />";
?>

<?php foreach ($serverStatus as $privServerName => $gameServers): ?>
    <?php foreach ($gameServers as $serverName => $gameServer): ?>
		<div id="status">
			<div class="status">
				<span class="login"><?php if ($gameServer['loginServerUp']) { echo $online; } else { echo $offline; } ?></span>
				<span class="char"><?php if ($gameServer['charServerUp']) { echo $online; } else { echo $offline; } ?></span>
				<span class="map"><?php if ($gameServer['mapServerUp']) { echo $online; } else { echo $offline; } ?></span>
			</div>
			<div class="online_count">
				<?php echo $gameServer['playersOnline'] ?> Players
			</div>
			<div class="time">
				<iframe src="http://free.timeanddate.com/clock/i3csq6ix/n1038/fs12/fcff4542/tct/pct/ftb/th1" frameborder="0" width="50" height="17" allowTransparency="true"></iframe>
			</div>
		</div>
    <?php endforeach ?>
<?php endforeach ?>
	