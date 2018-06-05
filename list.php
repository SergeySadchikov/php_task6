<?php
$dir  = 'tests';
if(is_dir($dir)) { 
	$files = scandir($dir); 
	array_shift($files);
	array_shift($files);
	} 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Список тестов</title>
</head>
<body>
	<h1>Выберите тест</h1>
	<table cellspacing="2" border="1" cellpadding="5" width="600">
	<?php for($i=0; $i<sizeof($files); $i++) { ?>      
		<tr>
			<td><?php echo 'Тест № '.(string)($i+1);?></td>
			<td><a href="test.php?name=<?php echo $files[$i]; ?>" title="перейти к тесту"><?php echo $files[$i]; ?></a></td>
		</tr>
	<?php } ?>
	</table>
	<div><a href="index.php">На главную</a></div>
	<div><a href="admin.php">Добавить тест</a></div>
</body>
</html>