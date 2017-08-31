<?php 
	$a = $_POST["valorA"];
	$b = $_POST["valorB"];
	$oper = $_POST["operacion"];
	//sleep(3);

	if ($oper == "sumar" ){
		echo "La suma es ".($a+$b);
	}
	if ($oper == "restar" ){
		echo "La resta es ".($a-$b);
	}
	if ($oper == "multiplicar" ){
		echo "La multiplicacion es ".($a*$b);
	}
	
?>