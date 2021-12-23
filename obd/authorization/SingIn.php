<?
require_once(dirname(__FILE__).'/../connect_to_bd.php');
require_once(dirname(__FILE__).'/../query_bd.php');
require_once(dirname(__FILE__).'/../session.php');
require_once(dirname(__FILE__).'/../header.php');

$sql = "SELECT * FROM `user`";
$array = getInfo($link,$sql);
$error = '';
$nickname = '';
$passwd = '';
$email = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usInfo = $_POST;
    $passwd = $_POST['passwd'];
    $nickname = $_POST['nickname'];
    foreach($array as $value){
        if($nickname === $value['nickname']){
            $hash = $value['passwd'];
            if(!password_verify($passwd, $hash))
                $error = 'Wrong password';
                else{
                    $error = '';
                }
            break;
        }
        else{
            $error = "User is not found";
        }
    }
}
?>
<div class="SinIn">
<form method="post">
	<p>nickname:</p><br>
	<input type="text" name="nickname" value=<?=$nickname?>><br>
	<p>password:</p><br>
	<input type="text" name="passwd" value=<?=$passwd?>><br>
	<button>Send</button>
	<? if($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <? $_SESSION = $value; ?>
        <? header('Location: http://obd'); ?>
        <? else: ?>
            <p><?= $error ?></p>
            <? endif; ?>
</form>
</div>