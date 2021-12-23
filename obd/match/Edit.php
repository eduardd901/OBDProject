<?php
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
$map = '';
$url = '';
$sql = "SELECT * FROM `team`";
$data = getInfo($link,$sql);
$error = '';
if($_SESSION['role_id'] == 1 && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $url = $_POST['url'];
    $map = $_POST['map'];
    $teamID1 = $_POST['team1'];
    $teamID2 = $_POST['team2'];
    $datetime = $_POST['date'];
    if($teamID1 == $teamID2)
        $error = 'choose different teams';
    if(empty($datetime) || empty($map) || empty($teamID2) || empty($teamID1) || empty($url))
        $error = 'not all fields are filled';
    else if(!filter_var($url,FILTER_VALIDATE_URL))
        $error = 'url entered incorrectly';
    $sql = "UPDATE `match` SET `team1`='$teamID1',`team2`='$teamID2',`maps`='$map',`date_and_time`='$datetime',`urlMap`='$url'";
}
?>
<?if($_SESSION['role_id'] == 1):?>
    <div class="EditMatch">
    <form method="post">
	<p>map: </p><br>
	<input type="text" name="map" value=<?=$map?>><br>
	<p>url link to the map image:</p><br>
	<input type="text" name="url" value=<?=$url?>><br>
    <p>enter date:</p><br>
    <input type="datetime-local" name="date"><br>
    <select name="team1">
    <?foreach($data as $value):?>
        <option value="<?=$value['team_id'];?>"><?=$value['name_team'];?></option>
        <?endforeach;?>
    </select>
    <select name="team2">
    <?foreach($data as $value):?>
        <option value="<?=$value['team_id'];?>"><?=$value['name_team'];?></option>
        <?endforeach;?>
    </select><br>
	<button>Send</button>
	<? if($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?insertInfo($link,$sql);?>
        <? header('Location: http://obd/match/MatchInfo.php'); ?>
        <? else: ?>
            <p><?= $error ?></p>
            <? endif; ?>
    </form>
    </div>
    <?endif;?>