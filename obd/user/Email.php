<?
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');
$email = '';
$passwd = '';
$error = '';
if($_SESSION != []){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    if($email == '')
        $error = 'Вы не ввели почту!';
    if($email == $_SESSION['email'])
        $error = 'Вы не изменили почту! Если вы передумали, просто вернитесь назад!';
    if(!password_verify($passwd, $_SESSION['passwd']))
        $error = 'Пароли не совпадают!';
    $nickname = $_SESSION['nickname'];
    $sql = "UPDATE `user` SET `email` = '$email' WHERE `user`.`nickname` = '$nickname'";
    }
}
?>
<? if($_SESSION != []): ?>
    <div class="Passwd">
    <form method="post">
    <p>your email:</p><br>
	<input type="text" name="email" value=<?=$_SESSION['email']?>><br>
	<p>Enter your password:</p><br>
	<input type="text" name="passwd" value=<?=$passwd?>><br>
	<button>Send</button>
	<? if($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <? insertInfo($link,$sql); ?>
        <p>Email changed!</p>
        <?$_SESSION['email'] = $email?>
        <? else: ?>
            <p><?= $error ?></p>
            <? endif; ?>
    </form>
    </div>
    <?endif;?>