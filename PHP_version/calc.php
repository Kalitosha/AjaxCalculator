<?php
error_reporting( E_ERROR ); 

header('Access-Control-Allow-Origin: *');
header('Content-type: text/html; charset=utf-8');

$data = ($_POST["data"]); // теперь у нас есть строка введенных символов
$data = strtr($data,' ', '+'); // заменяем обрезанные плюсы(пробелы) нормальными плюсами

$result = str_split($data); // делаем массив символов
$length = count($result);
$arg = false;
if ($length <> 0) {	
	if ($length == 1 && (ord($result[$length])<47 && ord($result[$length])>58) ) {
		unset($result[$length]); // удаляем последний символ
		eval("echo($result);");
	}
	else if ((ord($result[$length])<47 && ord($result[$length])>58) ||  // если последний символ не цифра
				(ord($result[$length-1])<47 && ord($result[$length-1])>58)) { // и предпоследний не цифра
		unset($result[$length]); // удаляем последний символ
		eval("echo($result);");
	}	
	$result = implode($result); 
	eval("echo($result);");
}
else eval("echo($data);");












/*
$expression = array(); // здесь будет собранное выражение
$s = 0;
$expression[0] = 0;
$endNumb = false;

foreach ($data as $key => $value){ // собираем цифры в числа	
	//is_int() — Проверяет, является ли переменная переменной целочисленного типа
	if ((ord($value)>47 && ord($value)<58) || $value =='.') { // если это цифра
		// ее надо собрать

		$expression[$s] = $expression[$s] . $value;
		continue;
	}
	else { // иначе это знак
		$s++;
		$expression[$s] = $value;
		$s++;
		$expression[$s] = 0; // чтобы не было ошибки конкатенации с пустой ячейкой
	}
}*/

/*
$symbol = '';
$first = true;


foreach ($expression as $key => $value) { // вычисляем значение
	if ((ord($value)>47 && ord($value)<58)) {
		if ($first) {
			$result = $value + 0.0; 
			$first = false;
		}
		else{	
			if($symbol == 'p'){ // (ord($symbol) == 43){ 
				$result = ($result * 1) + $value;
			}
			else if($symbol == '-'){
				$result -= $value;
			}
			else if($symbol == '*'){
				$result *= $value;
			}
			else if($symbol == '/'){ 
				$result /= $value;
			}
		}		
	}	
	else {
		$symbol = $value;
	}
}

echo($result);
*/
/*
$pred = 0;
$sled = 0;
for ($j = 0; $j < 2; $j++){	
	for ($i = 0; $i < count($expression); $i++){ // вычисляем значение		
	
		if($expression[$i] == '') {
			continue;
		}		
	
		if ($j == 0) {		
			if ($expression[$i] == '*') {				
				for ($k=$i; $k < count($expression); $k++) { 
					if ($expression[$k] == '') {
						continue;
					}
					$sled = $k;
					break;
				}
				$expression[$pred] = ($expression[$pred] + 0.0) * $expression[$sled];
				$expression[$sled] = '';
				$expression[$i] = '';
			}
			else if($expression[$i] == '/') {
				for ($k=$i; $k < count($expression); $k++) { 
					if ($expression[$k] == '') {
						continue;
					}
					$sled = $k;
					break;
				}
				$expression[$pred] = ($expression[$pred] + 0.0) / $expression[$sled];
				$expression[$sled] = '';
				$expression[$i] = '';
			}
		}
		else if ($j == 1) {
			if ($expression[$i] == '+') {
				for ($k=$i; $k < count($expression); $k++) { 
					if ($expression[$k] == '') {
						continue;
					}
					$sled = $k;
					break;
				}
				$expression[$pred] = ($expression[$pred] + 0.0) + $expression[$sled];
				$expression[$sled] = '';
				$expression[$i] = '';
			}
			if ($expression[$i] == '-') {
				for ($k=$i; $k < count($expression); $k++) { 
					if ($expression[$k] == '') {
						continue;
					}
					$sled = $k;
					break;
				}
				$expression[$pred] = ($expression[$pred] + 0.0) - $expression[$sled];
				$expression[$sled] = '';
				$expression[$i] = '';
			}
		}
		$pred = $i;
	}
}
echo($expression[0]);

*/




//foreach ($expression as $key => $value) { // вычисляем значение
/*
for ($i = 0; $i < count($expression); $i++){
	// is_numeric — Проверяет, является ли переменная числом или строкой, содержащей число
	if (is_float($expression[$i] + 0.0) = true) {
		if ($first) {
			$result = $expression[$i]; 
			$first = false;
		}
		else{		
			if($symbol == '+'){
				//$i+=1;
				$result += $expression[$i];
			}
			else if($symbol == '-'){
				//$i+=1;
				$result -= $expression[$i];
			}
			else if($symbol == '*'){
				//$i+=1;
				$result *= $expression[$i];
			}
			else if($symbol == '/'){
				//$i+=1;
				$result /= $expression[$i];
			}
			else if($symbol == 's'){ // sin
				//$i+=1;
				$result += sin($expression[$i]);
			}
			else if($symbol == 'c'){ // cos
				//$i+=1;
				$result += cos($expression[$i]);
			}
			else if($symbol == 't'){ // tg
				//$i+=1;
				$result += tg($expression[$i]);
			}
			else if($symbol == 'g'){ // ctg 
				//$i+=1;
				$result += ctg($expression[$i]);
			}
			else if($symbol == 'p'){ // степень
				//$i+=1;
				$result += pow($expression[$i], 2);
			}
			else if($symbol == 'r'){ // корень
				//$i+=1;
				$result += sqrt($expression[$i]);
			}
			else echo('error');
		}		
	}	
	else if ($expression[$i] == '='){
		return $result;
	}
	else $symbol == $expression[$i];
}
*/
//var_dump($result);
//echo json_encode($result); 
?>
