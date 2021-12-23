<?
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
$passwd = '';
$passwd_change = '';
$error = '';
if($_SESSION != []){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $passwd = $_POST['passwd'];
        $passwd_change = $_POST['passwd_ch'];
    if(!password_verify($passwd, $_SESSION['passwd']))
        $error = 'incorrect current password';
    if(strlen($passwd_change) < 6)
        $error = 'Пароль менее 6 символов';
    if($passwd_change != $_POST['passwd_ch2'])
        $error = 'Пароли не совпадают!';
    }
    $hash = password_hash($passwd_change, PASSWORD_BCRYPT);
    $nickname = $_SESSION['nickname'];
    $sql = "UPDATE `user` SET `passwd` = '$hash' WHERE `user`.`nickname` = '$nickname'";
}
?>
<? if($_SESSION != []): ?>
    <div class="Passwd">
    <form method="post">
    <p>Current password:</p><br>
	<input type="text" name="passwd" value=<?=$passwd?>><br>
	<p>New password:</p><br>
	<input type="text" name="passwd_ch" value=<?=$passwd_change?>><br>
    <p>Repeat password:</p><br>
    <input type="text" name="passwd_ch2"><br>
	<button>Send</button>
	<? if($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <? insertInfo($link,$sql); ?>
        <p>password changed!</p>
        <?$_SESSION['passwd'] = $passwd_change?>
        <? else: ?>
            <p><?= $error ?></p>
            <? endif; ?>
    </form>
    </div>
    <?endif;?>