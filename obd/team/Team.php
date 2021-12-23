<?php
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
if($_SERVER['REQUEST_METHOD'] === 'GET' && $_SESSION != []){
    $name = $_GET['name_team'];
    $id = $_GET['team_id'];
    $info = $_GET['information'];
    $sql = "SELECT `nickname` FROM `user` WHERE user.user_id IN (SELECT `userID` FROM `storeplayers` WHERE storeplayers.teamID = $id)";
    $data = getInfo($link,$sql);
    $t = false;
}
?>
<? if($_SERVER['REQUEST_METHOD'] === 'GET' && $_SESSION != []): ?>
    <p class="heading"><?=$name?></p class="heading">
    <body>
        <p>information:</p>
        <p><?=$info;?></p>
        <p>Players:</p>
        <?foreach($data as $value):?>
            <p><?=$value['nickname'];?></p><br>
            <? if($_SESSION['nickname'] == $value['nickname']):?>
                <? $t = true; ?>
                <?endif;?>
            <?endforeach;?>
            <?if($_SESSION['role_id'] == 2): ?>
                <ul class = "list"><li><a href="http://obd/team/Apply.php?team_id=<?=$id?>">apply</a></li></ui>
                <?endif;?>
            <?if($_SESSION['role_id'] == 3 && $t):?>
                <ul class = "list"><li><a href="http://obd/team/ExitTeam.php">Exit</a></li></ul>
                <?endif;?>
            <?if($_SESSION['role_id'] == 4 && $t):?>
                <ul class = "list">
                <li><a href="http://obd/team/DeletePlayer.php">Removing players from a team</a></li><br>
                <li><a href="http://obd/team/DeleteTeam.php">Delete team</a></li><br>
                <li><a href="http://obd/team/Applications.php">Applications</a></li></ul>
                <?endif;?>
    </body>
    <? endif; ?>