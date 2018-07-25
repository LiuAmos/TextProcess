
<?php
session_start();
$_SESSION['account']="";
$_SESSION['password']="";
?>



<html>

<head>
<meta charset="UTF-8">
<title>TextProcess</title>
</head>

<body>

<?php

// $array1 = array("color","red","tony","amos");
// $array2 = array("a", "b", "color","green", "shape","trapezoid", "four");
// $result = array_merge($array1, $array2);
// print_r($result);
// echo"-------------------"."<br>";


if (!$fp=fopen("test.txt","r")){
    echo "檔案無法開啟";
	exit;
}
//echo $fp;
$array_merge=array("AA");
//$rule = '/[\x{4e00}-\x{9fa5}|\w]/u';
//preg_replace ( $pattern , $replacement ,$subject);
//
while (!feof($fp)){
	$str=fgets($fp);
	$str = iconv("BIG5","UTF-8", $str);
	$str_explode=explode(" ",$str);
	$len=count($str_explode);


	$array_merge=array_merge($array_merge,$str_explode);


	for($i=0;$i<$len;$i++){
	//echo $str_explode[$i]."<br>";

	}
	

	// echo"-------------------"."<br>";
}

sort($array_merge);
echo"-------------------"."<br>";
$len1=count($array_merge);
for($j=0;$j<$len1;$j++){
echo $array_merge[$j]."<br>";
}
echo"-------------------"."<br>";

print_r(array_count_values ($array_merge));

fclose($fp) ;


?>


</body>


</html>