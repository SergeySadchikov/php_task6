<?php 
session_start();

$ok = [];
$not = [];

if (!empty($_POST)) {
	foreach ($_POST as $post_key => $post_value) {
		foreach ($_SESSION['tests'] as $test) {
				if ($post_key == $test['title'] && $post_value == $test['iscorreect']) {
					$ok[] = $test['title'];
				} 
				elseif ($post_key == $test['title'] && $post_value !== $test['iscorreect']) {
					$not[] = $test['title'];
				}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Результат теста</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Ваш результат: <?php echo count($ok);?> из <?php echo count($_SESSION['tests']);?></h2>

	<?php foreach ($ok as $good) { ?>
		<p><b>Верно: </b><?php echo $good;?></p>
	<?php } ?>

	<?php foreach ($not as $bad) { ?>
		<p><b>Неверно: </b><?php echo $bad;?> </p>
	<?php } ?>

	<div><a href="list.php">К списку тестов</a></div>
	<div><a href="index.php">На главную</a></div>
</body>
</html>
