<?
require_once(dirname(__FILE__) . '/../connect_to_bd.php');
require_once(dirname(__FILE__) . '/../query_bd.php');
require_once(dirname(__FILE__) . '/../session.php');
require_once(dirname(__FILE__) . '/../header.php');

$sql = "SELECT `nickname` FROM `user`";

$array = getInfo($link, $sql);
$error = '';
$nickname = '';
$passwd = '';
$email = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usInfo = $_POST;
    $nickname = $usInfo['nickname'];
    $passwd = $usInfo['passwd'];
    $email = $usInfo['email'];
    if ($usInfo['nickname'] === '' || $usInfo['passwd'] === '')
        $error = 'Fill in all fields';
    if ($array != '') {
        foreach ($array as $value)
            if ($usInfo['nickname'] === $value['nickname'])
                $error = 'This nickname already exists :(';
    }
    if (strlen($usInfo['passwd']) < 6)
        $error = 'Password less than 6 characters';
    if ($usInfo['passwd'] != $usInfo['passwd2'])
        $error = 'Password mismatch :(';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $error = 'mail entered incorrectly';
    $hash = password_hash($passwd, PASSWORD_BCRYPT);
    $sql = "INSERT INTO `user`( `role_id`, `nickname`, `passwd`,`email`) VALUES ( '2','$nickname','$hash','$email')";
}
?>
<div class="SingUp">
    <form method="post">
        <p>nickname:</p><br>
        <input type="text" name="nickname" value=<?= $nickname ?>><br>
        <p>Enter your email:</p><br>
        <input type="text" name="email" value=<?= $email ?>><br>
        <p>password:</p><br>
        <input type="text" name="passwd" value=<?= $passwd ?>><br>
        <p>Repeat password:</p><br>
        <input type="text" name="passwd2"><br>
        <button>Send</button>
        <? if ($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST') : ?>
            <? insertInfo($link, $sql); ?>
            <p>You have successfully registered!</p>
            <li><a href="SingIn.php">SingIn</a></li>
        <? else : ?>
            <p><?= $error ?></p>
        <? endif; ?>
    </form>
</div>