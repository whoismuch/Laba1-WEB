<!DOCTYPE HTML>
<html lang = "ru">
<head>
   <meta charset="utf-8">
   <title>Laba1</title>
   <link rel="stylesheet" href="main.css">
</head>
<body>  
   <div class="header"> 
      <em>
         <p style="color: purple">Байрамова Хумай</p>
         <p style="color: purple">Вариант №2802</p>
         <p style="color: purple">Группа №P3132</p>
      </em>
   </div>

<?php 

function isThePointIn ($x, $y, $r) {
	if (($x >= -$r/2 && $x <= 0 && $y <= $r && $y >= 0)
	 || ($x*$x + $y*$y <= $r*$r/4 && $x >= 0 && $y <= 0)
	 || ($x >= 0 && $y>=0 && $y <= -2*$x + $r ) )
		return "<span style='color: green'>Попал</span>";
	else return "<span style='color: red'>Мимо</span>";
}

function checkParametres($x, $y, $r){
        if  (!in_array($x, array(-3, -2, -1, 0, 1, 2, 3, 4, 5)) || !is_numeric($y) || !is_numeric($x) || !is_numeric($r) || $y < -3 || $y > 5 || !in_array($r, array( 1, 1.5, 2, 2.5, 3))) return false;
        else return true;
    }

$start = microtime(true);
date_default_timezone_set("Europe/Moscow");
session_start();

$x = (int) $_GET["chooseX"];
$y = (double) $_GET["enterY"];
$r = (double) $_GET["selectR"];

if ($x == 0 && $_GET["chooseX"]!="0" || $y == 0 && $_GET["enterY"]!="0" || $r == 0 && $_GET["selectR"]!="0") {
	$x = $_GET["chooseX"];
	$y = $_GET["enterY"];
	$r = $_GET["selectR"];
}


$current_time = date("H:i:s");
$result = isThePointIn($x, $y, $r);

if (!checkParametres($x, $y, $r)) {
	$result = "<span style ='color: red'>Данные не верны</span>";
}

$time_of_exec = round((microtime(true) - $start)*1000000, 2) ;

$finalResult = array($x, $y, $r, $time_of_exec, $current_time, $result);

if (!isset($_SESSION['allResults'])) {
	$_SESSION['allResults'] = array();
}

array_push($_SESSION['allResults'], $finalResult)

?>

 <div class="centerBorder">
 	<table>
 		
 		<tr><th>X</th><th>Y</th><th>R</th><th>Время<br>Исполнения</th><th>Текущее<br>Время</th><th>Результат</th></tr>
 		<?php foreach ($_SESSION['allResults'] as $value) { ?>
 			<tr>

 				<td><?php echo $value[0] ?></td>
 				<td><?php echo $value[1] ?></td>
 				<td><?php echo $value[2] ?></td>
 				<td><?php echo $value[3] ?></td>
 				<td><?php echo $value[4] ?></td>
 				<td><?php echo $value[5] ?></td>

 			</tr>

 			<?php } ?>
 	</table>
</div>

</body>
</html>