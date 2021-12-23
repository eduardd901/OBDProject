<?
require_once(dirname(__FILE__) . '/../../session.php');
require_once(dirname(__FILE__) . '/../../connect_to_bd.php');
require_once(dirname(__FILE__) . '/../../query_bd.php');
require_once(dirname(__FILE__) . '/../SelectUser.php');
require_once(dirname(__FILE__) . '/../../header.php');
$error = '';
$nickname = $_SESSION['sel_nickname'];
$email = $_SESSION['sel_email'];
$passwd = $_SESSION['sel_passwd'];
$id = $_SESSION['sel_id'];
if ($_SESSION['role_id'] == 1) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nickname = $_POST['nickname'];
        $passwd = $_POST['passwd'];
        $email = $_POST['email'];
        if (strlen($passwd) < 6)
            $error = 'Пароль слишком короткий';
        if ($nickname != $_SESSION['sel_nickname']) {
            $sql = "SELECT `nickname` FROM `user`";
            $data = getInfo($link, $sql);
            foreach ($data as $value) {
                if ($value['nickname'] == $nickname) {
                    $error = 'Такой ник уже есть(';
                    break;
                }
            }
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $error = 'mail entered incorrectly';
        if ($email === '' || $nickname === '' || $passwd === '')
            $error = 'Не все поля заполнены!';
        $hash = password_hash($passwd, PASSWORD_BCRYPT);
        $sql = "UPDATE `user` SET `nickname`='$nickname',`passwd`='$hash',`email`='$email' WHERE user.user_id = '$id'";
    }
}
?>
<? if ($_SESSION['role_id'] == 1) : ?>
    <div class="Edit">
        <form method="post">
            <p>nickname:</p><br>
            <input type="text" name="nickname" value=<?= $nickname ?>><br>
            <p>password:</p><br>
            <input type="text" name="passwd" value=<?= $passwd ?>><br>
            <p>email:</p><br>
            <input type="text" name="email" value=<?= $email ?>><br>
            <button>Send</button>
            <? if ($error === '' && $_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                <? insertInfo($link, $sql); ?>
                <? cancelSelection(); ?>
                <? header('Location: ../ChangeUser.php'); ?>
            <? else : ?>
                <p><?= $error ?></p>
            <? endif; ?>
        </form>
    </div>
<? endif; ?>