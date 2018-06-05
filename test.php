<?php
session_start();

if (!empty($_GET["name"])) {
	$tests=[];
	$tests = file_get_contents('./tests/'.$_GET['name']);
	$tests = json_decode($tests,true);
}

$_SESSION['tests'] = $tests;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Пройди тест!</title>
</head>
<html>
<body>
	<h3><?php echo(stristr($_GET["name"],'.',true)) ?></h3>
	<form action="result.php" method="POST">
	<?php  foreach ($tests as $test) {?>
		<fieldset>
		<legend><?php echo $test['question'];?></legend>
		<?php foreach ($test['answers'] as $key => $answer ){ ?>
			<label><input type="radio" name="<?php echo $test['title'];?>" value="<?php echo $key;?>"><?php echo $answer['text']; ?></label>
		<?php } ?>
		</fieldset>
		<?php } ?>	
		<input type="submit" value="Результат">
	</form>

	<div><a href="index.php">На главную</a></div>
	<div><a href="list.php">К списку тестов</a></div>
</body>
</html>




