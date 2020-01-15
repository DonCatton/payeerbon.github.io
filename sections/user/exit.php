<?

unset($_SESSION['login']);
session_destroy();
setcookie('remember', '');
header("Location: /");

?>